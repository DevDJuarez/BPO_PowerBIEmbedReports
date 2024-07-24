<?php

use App\Http\Controllers\admin\ConfiguracionController;
use App\Http\Controllers\admin\EmpresaController;
use App\Http\Controllers\admin\PBIGrupoController;
use App\Http\Controllers\business\PBIGrupoController as BusinessPBIGrupoController;
use App\Http\Controllers\admin\PBIReporteController;
use App\Http\Controllers\admin\UsuarioController;
use App\Http\Controllers\business\ReportePowerBiController;
use App\Http\Controllers\admin\EmpresaUsuarioController;
use App\Http\Controllers\admin\PerfilController;
use App\Http\Controllers\business\PBIReporteController as BusinessPBIReporteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/usuarios', UsuarioController::class);
    Route::resource('/empresas', EmpresaController::class);

    Route::post('/empresas/usuarios/store', [EmpresaUsuarioController::class, 'store'])->name('empresas.usuarios.store');
    Route::put('/empresas/usuarios/update/{id}', [EmpresaUsuarioController::class, 'update'])->name('empresas.usuarios.update');
    Route::delete('/empresas/usuarios/destroy/{id}', [EmpresaUsuarioController::class, 'destroy'])->name('empresas.usuarios.destroy');

    Route::get('/empresas/{empresa}/{id}/usuarios', [EmpresaUsuarioController::class, 'index'])->name('empresas.usuarios');
    Route::get('/empresas/{empresa}/{id}/usuarios/create', [EmpresaUsuarioController::class, 'create'])->name('empresas.usuarios.create');
    Route::get('/empresas/{empresa}/{empresaId}/usuarios/{usuario}/edit', [EmpresaUsuarioController::class, 'edit'])->name('empresas.usuarios.edit');

    Route::get('/empresas/{empresa}/{id}/espacios-de-trabajo/{sincronizar}', [PBIGrupoController::class, 'index'])->name('empresas.grupos');
    Route::get('/empresas/{empresa}/espacios-de-trabajo/{id}/reportes/{sincronizar}', [PBIGrupoController::class, 'reportes'])->name('grupos.reportes');
    Route::get('/empresas/{empresa}/espacios-de-trabajo/reportes/{id}', [PBIReporteController::class, 'show'])->name('reportes.show');


    Route::get('/empresas/{empresa}/{id}/reportes', [ReportePowerBiController::class, 'index'])->name('empresas.reportes');
    // Route::get('/empresas/{empresa}/{id}/reportes/{reporteId}', [ReportePowerBiController::class, 'show'])->name('reportes.show');
    Route::get('/configuracion/perfil', [PerfilController::class, 'show'])->name('perfil.show');
    Route::post('/configuracion/perfil/data/update', [PerfilController::class, 'updateData'])->name('perfil.dataUpdate');
    Route::post('/configuracion/perfil/password/change', [PerfilController::class, 'updatePassword'])->name('admin.password.change');

    Route::get('/configuracion/login/imagen', [ConfiguracionController::class,'loginImage'])->name('login.imagen');
    Route::post('/configuracion/login/imagen/store', [ConfiguracionController::class,'loginImageStore'])->name('login.imagen.store');
});

Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('/{empresa}/espacios-de-trabajo', [BusinessPBIGrupoController::class, 'index'])->name('business.grupos.index');
    Route::get('/{empresa}/espacios-de-trabajo/{id}/reportes', [BusinessPBIGrupoController::class, 'reportes'])->name('business.grupos.reportes');
    Route::get('/{empresa}/espacios-de-trabajo/reportes/{id}', [BusinessPBIReporteController::class, 'show'])->name('business.reportes.show');

    // Route::get('/configuracion/perfil', [PerfilController::class, 'show'])->name('perfil.show');
    // Route::post('/configuracion/perfil/data/update', [PerfilController::class, 'updateData'])->name('perfil.dataUpdate');
    // Route::post('/configuracion/perfil/password/change', [PerfilController::class, 'updatePassword'])->name('admin.password.change');
});
