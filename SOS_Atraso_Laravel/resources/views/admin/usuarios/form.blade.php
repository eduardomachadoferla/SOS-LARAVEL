@extends('layouts.admin')
@section('admin-content')
@php($atuais=explode(',',$usuario->permissao??''))
<section class="admin-card" style="max-width:760px">
    <h1 class="admin-title">{{ $usuario->exists ? 'EDITAR' : 'ADICIONAR' }} USUÁRIO</h1>
    <form method="post" action="{{ $usuario->exists ? route('admin.usuarios.update',$usuario) : route('admin.usuarios.store') }}">
        @csrf @if($usuario->exists) @method('PUT') @endif
        <input class="border w-full border-gray-400 rounded-md p-3 mb-5" name="nome" value="{{ old('nome',$usuario->nome) }}" placeholder="Nome" required>
        <input class="border w-full border-gray-400 rounded-md p-3 mb-5" type="email" name="email" value="{{ old('email',$usuario->email) }}" placeholder="Email" required>
        <select class="border w-full border-gray-400 rounded-md p-3 mb-5" name="setor" required>@foreach(['admin'=>'Admin','educador'=>'Educador','coordenacao'=>'Coordenação'] as $v=>$l)<option value="{{ $v }}" @selected(old('setor',$usuario->setor)===$v)>{{ $l }}</option>@endforeach</select>
        <input class="border w-full border-gray-400 rounded-md p-3 mb-5" type="password" name="senha" placeholder="{{ $usuario->exists ? 'Nova senha (opcional)' : 'Senha' }}" {{ $usuario->exists ? '' : 'required' }}>
        <div class="mb-5"><strong>Permissões</strong>@foreach(['gerenciar_alunos'=>'Gerenciar alunos','ver_relatorios'=>'Ver relatórios','editar_turmas'=>'Editar turmas','administrar_usuarios'=>'Administrar usuários'] as $v=>$l)<label class="block"><input style="display:inline-block;width:auto;margin-right:7px" type="checkbox" name="permissoes[]" value="{{ $v }}" @checked(in_array($v,old('permissoes',$atuais)))> {{ $l }}</label>@endforeach</div>
        <div class="report-actions"><button class="admin-btn admin-btn-dark" type="submit">SALVAR</button></div>
    </form>
</section>
@endsection
