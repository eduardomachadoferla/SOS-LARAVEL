@extends('layouts.admin')
@section('admin-content')
<section class="admin-card" style="max-width:760px">
    <h1 class="admin-title">{{ $aluno->exists ? 'EDITAR' : 'ADICIONAR' }} ALUNO</h1>
    <form method="post" action="{{ $aluno->exists ? route('admin.alunos.update',$aluno) : route('admin.alunos.store') }}">
        @csrf @if($aluno->exists) @method('PUT') @endif
        <input class="border w-full border-gray-400 rounded-md p-3 mb-5" name="nome" value="{{ old('nome',$aluno->nome) }}" placeholder="Nome" required>
        <input class="border w-full border-gray-400 rounded-md p-3 mb-5" name="matricula" value="{{ old('matricula',$aluno->matricula) }}" placeholder="Matrícula" required>
        <select class="border w-full border-gray-400 rounded-md p-3 mb-5" name="turma" required><option value="">Selecionar turma...</option>@foreach($turmas as $t)<option value="{{ $t->id }}" @selected((string)old('turma',$aluno->turma)===(string)$t->id)>{{ $t->turma }}</option>@endforeach</select>
        <div class="report-actions"><button class="admin-btn admin-btn-dark" type="submit">SALVAR</button></div>
    </form>
</section>
@endsection
