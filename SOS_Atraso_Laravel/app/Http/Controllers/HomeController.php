<?php
namespace App\Http\Controllers;
use App\Models\Aluno; use App\Models\Atraso; use App\Models\Turma; use Illuminate\Http\Request;
class HomeController extends Controller {
 public function index(){return view('home');}
 public function buscar(Request $r){$q=trim((string)$r->query('nome')); if($r->boolean('validar')) return response(Aluno::where('nome',$q)->exists()?'valido':'invalido'); $alunos=Aluno::where('nome','like','%'.$q.'%')->limit(10)->get(['nome','turma']); return response()->json($alunos);}
 public function registrar(Request $r){$d=$r->validate(['nome'=>'required|string','turma'=>'required|string|exists:turmas,id','motivo_atraso'=>'required|string','outro_text'=>'nullable|string|max:255']); $aluno=Aluno::where('nome',$d['nome'])->where('turma',$d['turma'])->first(); if(!$aluno) return back()->withInput()->with('erro','Selecione um aluno válido da lista.'); $turma=Turma::findOrFail($d['turma']); $motivo=$d['motivo_atraso']==='Outro'?'Outro: '.trim($d['outro_text']??''):$d['motivo_atraso']; $atraso=Atraso::create(['nome'=>$aluno->nome,'turma'=>$aluno->turma,'motivo'=>$motivo,'data'=>now()]); return view('ticket',compact('atraso','turma')); }
}