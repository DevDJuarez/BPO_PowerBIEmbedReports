<?php

namespace App\Http\Controllers\business;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Workspace;
use Illuminate\Http\Request;

class PBIGrupoController extends Controller
{
    public function index($nombreEmpresa)
    {
        $empresa = Empresa::findOrFail(auth()->user()->empresa_id);
        return view('business.grupos.index', compact('empresa'));
    }

    public function reportes($nombreEmpresa, $id)
    {
        $workspace = Workspace::findOrFail($id);
        return view('business.reportes.index', compact('workspace'));
    }
}
