<?php
use Illuminate\Support\Facades\Route; use App\Http\Controllers\HomeController; use App\Http\Controllers\AuthController; use App\Http\Controllers\Admin\{DashboardController,AlunoController,UsuarioController,RelatorioController};
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/alunos/buscar',[HomeController::class,'buscar'])->name('alunos.buscar'); 
Route::post('/atrasos',[HomeController::class,'registrar'])->name('atrasos.registrar');
Route::get('/admin/login',[AuthController::class,'loginForm'])->name('admin.login');
Route::post('/admin/login',[AuthController::class,'login'])->name('admin.login.post');
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function(){Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/',[DashboardController::class,'index'])->name('dashboard');
Route::post('/alunos/importar',[AlunoController::class,'importar'])->name('alunos.importar');
Route::resource('alunos',AlunoController::class)->parameters(['alunos'=>'aluno']);
Route::resource('usuarios',UsuarioController::class);
Route::get('/relatorios',[RelatorioController::class,'index'])->name('relatorios.index');
Route::get('/relatorios/pdf',[RelatorioController::class,'pdf'])->name('relatorios.pdf');
Route::get('/relatorios/totais',[RelatorioController::class,'totais'])->name('relatorios.totais');Route::get('/relatorios/totais/pdf',[RelatorioController::class,'totaisPdf'])->name('relatorios.totais.pdf');});