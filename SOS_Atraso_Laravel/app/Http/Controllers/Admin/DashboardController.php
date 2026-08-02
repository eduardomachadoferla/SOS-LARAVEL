<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Aluno; use App\Models\Atraso; use App\Models\Usuario;
class DashboardController extends Controller { public function index(){return view('admin.dashboard',['atrasosHoje'=>Atraso::whereDate('data',today())->count(),'totalAtrasos'=>Atraso::count(),'totalAlunos'=>Aluno::count(),'totalUsuarios'=>Usuario::count()]);}}
