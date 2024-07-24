<?php

use Carbon\Carbon;
use App\Models\Empresa;
use App\Models\Workspace;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;

function getAccessToken($usuario, $password, $client_id, $client_secret)
{
    $response = [];
    $clienteREST = new Client();
    $url = "https://login.microsoftonline.com/common/oauth2/token";
    try {
        $response = $clienteREST->post($url, [
            'form_params' => [
                'grant_type' => 'Password',
                'resource' => 'https://analysis.windows.net/powerbi/api',
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'username' => $usuario,
                'password' => $password,
                'scope' => 'Dataset.Read.All',
            ],
        ]);
        $body = json_decode((string) $response->getBody(), true);
        return $body;
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to get access token'], 500);
    }
}

function estaTokenVencido(Empresa $empresa)
{
    $fechaActual = Carbon::now();
    $fechaExpiracionToken = Carbon::parse($empresa->fecha_expiracion_token);
    $fechaExpiracionToken->setTimezone('America/La_Paz');
    $diferenciaEnMinutos = $fechaActual->diffInMinutes($fechaExpiracionToken);
    if ($diferenciaEnMinutos < 0) {
        return true;
    }
    return false;
}

function refreshToken(Empresa $empresa)
{
    $clienteREST = new Client();
    $url = "https://login.microsoftonline.com/common/oauth2/token";
    try {
        $response = $clienteREST->post($url, [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'resource' => 'https://analysis.windows.net/powerbi/api',
                'client_id' => $empresa->client_id,
                'client_secret' => $empresa->client_secret,
                'username' => $empresa->usuario,
                'password' => Crypt::decrypt($empresa->clave),
                'scope' => 'Dataset.Read.All',
                'refresh_token' => $empresa->refresh_token
            ],
        ]);
        $body = json_decode((string) $response->getBody(), true);
        $token = $body['access_token'];
        $refresh_token = $body['refresh_token'];
        $fechaExpiracionJwt = $body['expires_on'];
        $fechaExpiracion = new DateTime('@' . $fechaExpiracionJwt);
        $fechaExpiracion->setTimezone(new DateTimeZone('America/La_Paz'));
        $fechaExpiracionFormateada = $fechaExpiracion->format('Y-m-d H:i:s');
        $empresa->token = $token;
        $empresa->refresh_token = $refresh_token;
        $empresa->fecha_expiracion_token = $fechaExpiracionFormateada;
        $empresa->update();
        return true;
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to refresh access token'], 500);
    }
}

function getWorkspaces(Empresa $empresa)
{
    $url = 'https://api.powerbi.com/v1.0/myorg/groups';
    $clienteREST = new Client();
    try {
        $response = $clienteREST->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $empresa->token,
            ],
        ]);
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Failed to fetch reports: ' . $response->getStatusCode());
        }
        $reporte = json_decode($response->getBody()->getContents(), true);
        return $reporte['value'];
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to get workspaces'], 500);
    }
}

function getReportesByWorkspace(Workspace $workspace)
{
    $url = 'https://api.powerbi.com/v1.0/myorg/groups/' . $workspace->workspaceId . '/reports';
    $clienteREST = new Client();
    try {
        $response = $clienteREST->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $workspace->empresa->token,
            ],
        ]);
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Failed to fetch reports: ' . $response->getStatusCode());
        }
        $reporte = json_decode($response->getBody()->getContents(), true);
        return $reporte['value'];
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to get reports by workspace'], 500);
    }
}
