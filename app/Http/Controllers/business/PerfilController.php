<?php

namespace App\Http\Controllers\business;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function show()
    {
        return view('business.configuracion.perfil');
    }

    public function updateData(Request $request)
    {
        $usuario = User::findOrFail(auth()->user()->id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->update();
        return redirect()->route('business.perfil.show');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no coincide.']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('business.perfil.show')->with('success', 'Contraseña actualizada correctamente.');
    }
}
