<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ImagenConfiguracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    public function loginImage()
    {
        $imagen = ImagenConfiguracion::where('pantalla','LOGIN')->where('nombre','BG_AUTH')->first();
        return view('admin.configuracion.login.imagen',compact('imagen'));
    }

    public function loginImageStore(Request $request)
    {
        $imagen = ImagenConfiguracion::where('pantalla','LOGIN')->where('nombre','BG_AUTH')->first();
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $fileName = $file->getClientOriginalName();
            $filePath = 'auth/' . $fileName;
            Storage::disk('public_images')->delete($imagen->path);
            Storage::disk('public_images')->put($filePath, $request->file('imagen')->getContent());
            $imagen->path = $filePath;
            $imagen->update();
        } else {
            return redirect()->route('login.imagen')
            ->with('error', 'Imagen de background no encontrado');
        }
        return redirect()->route('login.imagen')
            ->with('success', 'Background actualizado exitosamente');
    }
}
