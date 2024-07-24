<?php

namespace App\Http\Controllers\business;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;

class ReportePowerBiController extends Controller
{
    private $scope = 'Dataset.Read.All';

    public function index($nombreEmpresa, $empresaId)
    {
        $empresa = Empresa::findOrFail($empresaId);
        $token = $this->getAccessToken($empresa);
        $reportes = $this->getReportes($token, env('PB_TENANT_ID', ''));
        // dd($reportes);
        return view('business.reports.index', compact('reportes', 'empresa'));
    }

    public function show($nombreEmpresa, $empresaId, $reporteId)
    {
        $empresa = Empresa::findOrFail($empresaId);
        $token = $this->getAccessToken($empresa);
        $reporte = $this->getReporte($token, $reporteId);
        $accessToken = $token;
        $embedUrl = $reporte['embedUrl'];
        $reportId = $reporteId;
        $nombre = $reporte['name'];
        return view('business.reports.show', compact('nombre', 'accessToken', 'embedUrl', 'reportId'));
    }

    private function getAccessToken(Empresa $empresa)
    {
        $clienteREST = new Client();
        $url = "https://login.microsoftonline.com/common/oauth2/token";
        try {
            $response = $clienteREST->post($url, [
                'form_params' => [
                    'grant_type' => 'Password',
                    'resource' => 'https://analysis.windows.net/powerbi/api',
                    'client_id' => env('PB_CLIENT_ID', ''),
                    'client_secret' => env('PB_CLIENT_SECRET', ''),
                    'username' => $empresa->usuario,
                    'password' => Crypt::decrypt($empresa->clave),
                    'scope' => $this->scope,
                ],
            ]);
            $body = json_decode((string) $response->getBody(), true);
            return $body['access_token'];
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to get access token'], 500);
        }
    }

    private function getReportes($token, $tenantId)
    {
        $url = 'https://api.powerbi.com/v1.0/myorg/groups/' . $tenantId . '/reports';
        $clienteREST = new Client();
        try {
            $response = $clienteREST->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);
            if ($response->getStatusCode() !== 200) {
                throw new Exception('Failed to fetch reports: ' . $response->getStatusCode());
            }
            $reportes = json_decode($response->getBody()->getContents(), true)['value'];
            return $reportes;
            // dd($responseData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to get access token'], 500);
        }

        /*
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($url);

        if ($response->successful()) {
            dd($response->json());
            $reportes = $response->json()['value'];
            if (count($reportes) > 0) {
                $report = $reportes[0]; // Selecciona el primer reporte o ajusta según tus necesidades
                return $report; //['embedUrl'];
            } else {
                throw new \Exception('No se encontraron reportes disponibles.');
            }
        } else {
            throw new \Exception('Error al obtener el embed URL: ' . $response->body());
        }*/
    }

    private function getReporte($token, $reporteId)
    {
        $url = 'https://api.powerbi.com/v1.0/myorg/reports/' . $reporteId;
        $clienteREST = new Client();
        try {
            $response = $clienteREST->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);
            if ($response->getStatusCode() !== 200) {
                throw new Exception('Failed to fetch reports: ' . $response->getStatusCode());
            }
            $reporte = json_decode($response->getBody()->getContents(), true);
            return $reporte;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to get access token'], 500);
        }
    }
}
