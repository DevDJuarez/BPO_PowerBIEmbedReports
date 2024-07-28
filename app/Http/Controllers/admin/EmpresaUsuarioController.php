<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaUsuarioStoreRequest;
use App\Http\Requests\EmpresaUsuarioUpdateRequest;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmpresaUsuarioController extends Controller
{
    public function index($empresaNombre, $empresaId)
    {
        $empresa = Empresa::findOrFail($empresaId);
        $usuarios = User::where('empresa_id', $empresaId)->get();
        return view('admin.empresas.usuarios.index', compact('empresa', 'usuarios'));
    }

    public function create($empresaNombre, $empresaId)
    {
        $empresa = Empresa::findOrFail($empresaId);
        return view('admin.empresas.usuarios.create', compact('empresa'));
    }

    public function store(EmpresaUsuarioStoreRequest $request): RedirectResponse
    {
        $empresa = Empresa::findOrFail($request->empresa_id);
        User::create($request->all());
        return redirect()->route('empresas.usuarios', ['empresa' => Str::slug($empresa->nombre), 'id' => $empresa->id])
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($empresaNombre, $empresaId, $id)
    {
        $empresa = Empresa::findOrFail($empresaId);
        $usuario = User::findOrFail($id);
        return view('admin.empresas.usuarios.edit', compact('empresa', 'usuario'));
    }

    public function update(EmpresaUsuarioUpdateRequest $request, $id): RedirectResponse
    {
        $empresa = Empresa::findOrFail($request->empresa_id);
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('empresas.usuarios', ['empresa' => Str::slug($empresa->nombre), 'id' => $empresa->id])
            ->with('success', 'Usuario actualizado exitosamente');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $empresa = Empresa::findOrFail($user->empresa_id);
        $user->delete();
        return redirect()->route('empresas.usuarios', ['empresa' => Str::slug($empresa->nombre), 'id' => $empresa->id])
            ->with('success', 'Usuario eliminado exitosamente.');
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $empresa = Empresa::findOrFail($user->empresa_id);
        return view('admin.empresas.usuarios.reset-password', compact('user', 'empresa'));
    }
    public function resetPasswordStore(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($request->empresa_id);
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->update();
        return redirect()->route('empresas.usuarios', ['empresa' => Str::slug($empresa->nombre), 'id' => $empresa->id])
            ->with('success', 'Reseteo de contraseña exitosamente');
    }
}
