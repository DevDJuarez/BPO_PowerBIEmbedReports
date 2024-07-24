<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::wherenull('empresa_id')->get();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
