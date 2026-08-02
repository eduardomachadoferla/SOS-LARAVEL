@extends('layouts.admin')
@section('admin-content')
<section class="admin-card">
    <h1 class="admin-title">CONSULTAR RELATÓRIO</h1>
    <div class="admin-toolbar"><a class="admin-btn" href="{{ route('admin.relatorios.totais.pdf') }}" target="_blank">GERAR PDF</a></div>
    <div class="table-wrap"><table class="admin-table"><thead><tr><th>Turma</th><th>Total de atrasos</th></tr></thead><tbody>@forelse($totais as $t)<tr><td><a href="{{ route('admin.relatorios.index',['turma'=>$t->turma]) }}" class="text-blue-500 underline">{{ $t->turma }}</a></td><td>{{ $t->total }}</td></tr>@empty<tr><td colspan="2">Sem registros!</td></tr>@endforelse</tbody></table></div>
</section>
@endsection
