<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaStoreRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Models\Empresa;
use App\Models\User;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empresas = Empresa::all();
        return view('admin.empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('admin.empresas.create');
    }

    public function store(EmpresaStoreRequest $request): RedirectResponse
    {
        $response = getAccessToken($request['usuario'], $request['clave'], $request['client_id'], $request['client_secret']);
        $request['clave'] = Crypt::encrypt($request['clave']);
        $token = $response['access_token'];
        $refresh_token = $response['refresh_token'];
        $fechaExpiracionJwt = $response['expires_on'];
        $fechaExpiracion = new DateTime('@' . $fechaExpiracionJwt);
        $fechaExpiracionFormateada = $fechaExpiracion->format('Y-m-d H:i:s');
        $request['token'] = $token;
        $request['refresh_token'] = $refresh_token;
        $request['fecha_expiracion_token'] = $fechaExpiracionFormateada;
        Empresa::create($request->all());
        return redirect()->route('empresas.index')
            ->with('success', 'Empresa creada exitosamente.');
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->clave = Crypt::decrypt($empresa->clave);
        return view('admin.empresas.edit', compact('empresa'));
    }

    public function update(EmpresaUpdateRequest $request, $id): RedirectResponse
    {
        $empresa = Empresa::findOrFail($id);
        $response = getAccessToken($request['usuario'], $request['clave'], $request['client_id'], $request['client_secret']);
        $request['clave'] = Crypt::encrypt($request['clave']);
        $token = $response['access_token'];
        $refresh_token = $response['refresh_token'];
        $fechaExpiracionJwt = $response['expires_on'];
        $fechaExpiracion = new DateTime('@' . $fechaExpiracionJwt);
        $fechaExpiracionFormateada = $fechaExpiracion->format('Y-m-d H:i:s');
        $request['token'] = $token;
        $request['refresh_token'] = $refresh_token;
        $request['fecha_expiracion_token'] = $fechaExpiracionFormateada;
        $empresa->update($request->all());

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa actualizada exitosamente');
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada exitosamente');
    }

    public function usuarios($slug, $id)
    {
        $usuarios = User::where('empresa_id', $id)->get();
        return view('admin.empresas.usuarios.index', compact('usuarios'));
    }
}
