@extends('layouts.admin')
@section('admin-content')
<section class="admin-card">
    <h1 class="admin-title">ALUNOS</h1>
    <div class="admin-toolbar">
        <form class="admin-search" method="get" action="{{ route('admin.alunos.index') }}">
            <input class="border border-gray-400 p-3" name="busca_nome" value="{{ $q }}" placeholder="Buscar pelo nome">
            <button class="admin-btn admin-btn-dark" type="submit">BUSCAR</button>
        </form>
        <a class="admin-btn" href="{{ route('admin.alunos.create') }}">ADICIONAR ALUNO</a>
    </div>
    <form method="post" enctype="multipart/form-data" action="{{ route('admin.alunos.importar') }}" class="import-form">
        @csrf
        <input type="file" name="arquivo" required>
        <button class="admin-btn" type="submit">IMPORTAR PLANILHA</button>
    </form>
    <div class="table-wrap">
        <table class="admin-table">
            <thead><tr><th>Nome</th><th>Turma</th><th>Matrícula</th><th>Ações</th></tr></thead>
            <tbody>
            @forelse($alunos as $a)
                <tr><td>{{ $a->nome }}</td><td>{{ $a->turma }}</td><td>{{ $a->matricula }}</td><td><div class="actions-cell"><a class="text-blue-500 underline" href="{{ route('admin.alunos.edit',$a) }}">Editar</a><form method="post" action="{{ route('admin.alunos.destroy',$a) }}" onsubmit="return confirm('Excluir aluno?')">@csrf @method('DELETE')<button class="admin-btn-danger" type="submit">Excluir</button></form></div></td></tr>
            @empty
                <tr><td colspan="4">Nenhum aluno encontrado.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $alunos->links() }}
</section>
@endsection
