@extends('layouts.admin')
@section('admin-content')
<section class="admin-card">
    <h1 class="admin-title">USUÁRIOS</h1>
    <div class="admin-toolbar">
        <form class="admin-search" method="get" action="{{ route('admin.usuarios.index') }}">
            <input class="border border-gray-400 p-3" name="busca_nome" value="{{ $q }}" placeholder="Buscar usuário">
            <button class="admin-btn admin-btn-dark" type="submit">BUSCAR</button>
        </form>
        <a class="admin-btn" href="{{ route('admin.usuarios.create') }}">ADICIONAR USUÁRIO</a>
    </div>
    <div class="table-wrap">
        <table class="admin-table">
            <thead><tr><th>Nome</th><th>E-mail</th><th>Setor</th><th>Permissões</th><th>Ações</th></tr></thead>
            <tbody>
            @forelse($usuarios as $u)
                <tr><td>{{ $u->nome }}</td><td>{{ $u->email }}</td><td>{{ $u->setor }}</td><td>{{ $u->permissao }}</td><td><div class="actions-cell"><a class="text-blue-500 underline" href="{{ route('admin.usuarios.edit',$u) }}">Editar</a><form method="post" action="{{ route('admin.usuarios.destroy',$u) }}" onsubmit="return confirm('Excluir usuário?')">@csrf @method('DELETE')<button class="admin-btn-danger" type="submit">Excluir</button></form></div></td></tr>
            @empty
                <tr><td colspan="5">Nenhum usuário encontrado.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $usuarios->links() }}
</section>
@endsection
