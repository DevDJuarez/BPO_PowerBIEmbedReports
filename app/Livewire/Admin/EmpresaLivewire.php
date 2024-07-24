<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Empresa;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class EmpresaLivewire extends Component
{
    public $empresas = [];
    public $empresaId = '';
    public $nombre = '';
    public $correo = '';
    public $usuario = '';
    public $clave = '';

    public $search = '';

    protected function rules()
    {
        return [
            'nombre' => 'required|string|min:2',
            'correo' => ['required', 'email'],
            'usuario' => 'required|string|min:2',
            'clave' => 'required|string|min:2',
        ];
    }

    public function render()
    {
        $this->empresas = Empresa::all(); // where('nombre', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(3);

        return view('livewire.admin.empresas.index', ['empresas' => $this->empresas]);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $response = $this->getAccessToken($validatedData['usuario'], $validatedData['clave']);
        $validatedData['clave'] = Crypt::encrypt($validatedData['clave']);
        $token = $response['access_token'];
        $refresh_token = $response['refresh_token'];
        $fechaExpiracionJwt = $response['expires_on'];
        $fechaExpiracion = new DateTime('@' . $fechaExpiracionJwt);
        $fechaExpiracionFormateada = $fechaExpiracion->format('Y-m-d H:i:s');
        $validatedData['token'] = $token;
        $validatedData['refresh_token'] = $refresh_token;
        $validatedData['fecha_expiracion_token'] = $fechaExpiracionFormateada;
        // dd($validatedData);
        Empresa::create($validatedData);
        $this->resetInput();
        session()->flash('message', 'Empresa creada exitosamente');
        $this->dispatch('cerrar-modal');
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        if ($empresa) {

            $this->empresaId = $empresa->id;
            $this->nombre = $empresa->nombre;
            $this->correo = $empresa->correo;
            $this->usuario = $empresa->usuario;
            $this->clave = Crypt::decrypt($empresa->clave);
        } else {
            return redirect()->to('/empresas');
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function update()
    {
        $validatedData = $this->validate();

        Empresa::where('id', $this->empresaId)->update([
            'nombre' => $validatedData['nombre'],
            'correo' => $validatedData['correo'],
            'usuario' => $validatedData['usuario'],
            'clave' => Crypt::encrypt($validatedData['clave']),
        ]);
        session()->flash('message', 'Empresa actualizada exitosamente');
        $this->resetInput();
        $this->dispatch('cerrar-modal');
    }

    public function delete($id)
    {
        $this->empresaId = $id;
    }

    public function destroy()
    {
        Empresa::find($this->empresaId)->delete();
        session()->flash('message', 'Empresa eliminada exitosamente');
        $this->dispatch('cerrar-modal');
    }

    public function cerrarModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->empresaId = null;
        $this->nombre = '';
        $this->correo = '';
    }

    private function getAccessToken($usuario, $password)
    {
        $response = [];
        $clienteREST = new Client();
        $url = "https://login.microsoftonline.com/common/oauth2/token";
        try {
            $response = $clienteREST->post($url, [
                'form_params' => [
                    'grant_type' => 'Password',
                    'resource' => 'https://analysis.windows.net/powerbi/api',
                    'client_id' => env('PB_CLIENT_ID', ''),
                    'client_secret' => env('PB_CLIENT_SECRET', ''),
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
}
