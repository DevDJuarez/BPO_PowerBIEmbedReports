<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->empresa_id) {
            $empresa = Empresa::findOrFail(auth()->user()->empresa_id);
            return redirect()->route('business.grupos.index', ['empresa' => $empresa->nombre]);
        } else {
            $totalUsuarios = User::wherenull('empresa_id')->count();
            $totalEmpresas = Empresa::all()->count();
            return view('home', compact('totalEmpresas', 'totalUsuarios'));
        }
    }
}
