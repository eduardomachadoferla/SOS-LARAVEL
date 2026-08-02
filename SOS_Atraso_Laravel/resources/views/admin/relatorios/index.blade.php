@extends('layouts.admin')
@section('admin-content')
<section class="admin-card">
    <h1 class="admin-title">CONSULTAR ALUNOS</h1>
    <form action="{{ route('admin.relatorios.index') }}" method="get" class="report-filters">
        <div class="date-group">
            <input class="border border-gray-400 rounded-md p-3" type="date" name="data1" value="{{ request('data1') }}">
            <span>até</span>
            <input class="border border-gray-400 rounded-md p-3" type="date" name="data2" value="{{ request('data2') }}">
        </div>
        <select class="border border-gray-400 rounded-md p-3" name="turma">
            <option value="">Selecionar turma...</option>
            @foreach($turmas as $t)<option value="{{ $t->id }}" @selected((string)request('turma')===(string)$t->id)>{{ $t->turma }}</option>@endforeach
        </select>
        <button class="admin-btn admin-btn-dark" type="submit">CONSULTAR RELATÓRIO</button>
    </form>
    <div class="table-wrap">
        <table class="admin-table">
            <thead><tr><th>Nome</th><th>Turma</th><th>Motivo</th><th>Data</th></tr></thead>
            <tbody>
            @forelse($atrasos as $a)
                <tr><td>{{ $a->nome }}</td><td>{{ $a->turma }}</td><td>{{ $a->motivo }}</td><td>{{ $a->data->format('d/m/Y - H:i:s') }}</td></tr>
            @empty
                <tr><td colspan="4">Sem registro na data selecionada!</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6 flex justify-center">{{ $atrasos->links() }}</div>
    <div class="report-actions"><a class="admin-btn" href="{{ route('admin.relatorios.pdf',request()->query()) }}" target="_blank">GERAR PDF</a></div>
</section>
@endsection
