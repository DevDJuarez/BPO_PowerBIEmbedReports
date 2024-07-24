<?php

namespace App\Http\Controllers\business;

use App\Http\Controllers\Controller;
use App\Models\Reporte;
use Illuminate\Http\Request;

class PBIReporteController extends Controller
{
    public function show($nombreEmpresa, $reporteId)
    {
        $reporte = Reporte::findOrFail($reporteId);
        if (estaTokenVencido($reporte->workspace->empresa)) {
            refreshToken($reporte->workspace->empresa);
            $reporte->refresh();
        }
        $accessToken = $reporte->workspace->empresa->token;
        $embedUrl = $reporte->embedUrl;
        $reportId = $reporteId;
        $nombre = $reporte->name;
        return view('business.reportes.show', compact('nombre', 'accessToken', 'embedUrl', 'reportId', 'reporte'));
    }
}
