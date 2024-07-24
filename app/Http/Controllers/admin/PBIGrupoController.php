<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Reporte;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PBIGrupoController extends Controller
{
    public function index($nombreEmpresa, $id, $sincronizar = null)
    {
        $empresa = Empresa::findOrFail($id);
        if ($sincronizar == 1) {
            if (estaTokenVencido($empresa)) {
                $response = refreshToken($empresa);
                $empresa->refresh();
            }
            $workspaces = Workspace::where('empresa_id',$id)->get();

            $response = getWorkspaces($empresa);
            foreach ($response as $workspace) {
                $existeWorkspace = Workspace::where('workspaceId',$workspace['id'])->where('empresa_id',$empresa->id)->first();
                if (!$existeWorkspace) {
                    Workspace::create([
                        // 'id' => $workspace['id'],
                        'isReadOnly' => $workspace['isReadOnly'],
                        'isOnDedicatedCapacity' => $workspace['isOnDedicatedCapacity'],
                        'type' => $workspace['type'],
                        'name' => $workspace['name'],
                        'workspaceId' => $workspace['id'],
                        'empresa_id' => $empresa->id,
                    ]);
                }else{
                    $workspaceId = $workspace['id'];
                    $workspaces = $workspaces->reject(function($item) use ($workspaceId){return $item->workspaceId===$workspaceId;});
                    $existeWorkspace->isReadOnly = $workspace['isReadOnly'];
                    $existeWorkspace->isOnDedicatedCapacity = $workspace['isOnDedicatedCapacity'];
                    $existeWorkspace->type = $workspace['type'];
                    $existeWorkspace->name = $workspace['name'];
                    $existeWorkspace->workspaceId = $workspace['id'];
                    $existeWorkspace->update();
                }
            }
            foreach ($workspaces as $item) {
                $workspaceToDelete = Workspace::findOrFail($item->id);
                $workspaceToDelete->delete();
            }
            $empresa->refresh();
        }
        return view('admin.grupos.index', compact('empresa'));
    }

    public function reportes($nombreEmpresa, $id, $sincronizar = null)
    {
        $workspace = Workspace::findOrFail($id);
        if ($sincronizar == 1) {
            if (estaTokenVencido($workspace->empresa)) {
                refreshToken($workspace->empresa);
                $workspace->refresh();
            }
            $reportes = Reporte::where('workspace_id', $id)->get();
            $response = getReportesByWorkspace($workspace);
            foreach ($response as $reporte) {
                $existeReporte = Reporte::find($reporte['id']);
                if (!$existeReporte) {
                    Reporte::create([
                        // 'id' => $reporte['id'],
                        'reportType' => $reporte['reportType'],
                        'name' => $reporte['name'],
                        'webUrl' => $reporte['webUrl'],
                        'embedUrl' => $reporte['embedUrl'],
                        'datasetId' => $reporte['datasetId'],
                        'reportId' => $reporte['id'],
                        'workspace_id' => $workspace->id,
                    ]);
                }else{
                    $reporteId = $reporte['id'];
                    $reportes = $reportes->reject(function($item) use ($reporteId){return $item->reportId===$reporteId;});
                    $existeReporte->reportType = $reporte['reportType'];
                    $existeReporte->name=$reporte['name'];
                    $existeReporte->webUrl=$reporte['webUrl'];
                    $existeReporte->embedUrl=$reporte['embedUrl'];
                    $existeReporte->datasetId=$reporte['datasetId'];
                    $existeReporte->reportId = $reporte['id'];
                    $existeReporte->update();
                }

            }
            foreach ($reportes as $item) {
                $reporteToDelete = Reporte::findOrFail($item->id);
                $reporteToDelete->delete();
            }
            $workspace->refresh();
        }
        return view('admin.reportes.index', compact('workspace'));
    }
}
