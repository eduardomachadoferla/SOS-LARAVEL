<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Atraso - Administração</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/geral.css') }}">
    <style type="text/tailwindcss">@theme{--color-marista:rgb(6,54,100);--color-marista2:rgb(28,149,206);}</style>
</head>
<body class="bg-marista">
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('imagens/logo-escolas-sociais.png') }}" class="brand-logo" alt="Marista Escola Social Cascavel"></a>
    <div class="brand-title textos txt"><span style="color:black">SOS</span><span style="color:white">ATRASO</span></div>
    <ul id="menu" class="menu">
        <li><a href="{{ route('admin.relatorios.totais') }}">Total por Turmas</a></li>
        <li><a href="{{ route('admin.relatorios.index') }}">Relatório Alunos</a></li>
        <li><a href="{{ route('admin.alunos.index') }}">Alunos</a></li>
        <li><a href="{{ route('admin.usuarios.index') }}">Usuários</a></li>
        <li><form method="post" action="{{ route('admin.logout') }}">@csrf<button type="submit">Logoff</button></form></li>
    </ul>
</header>
@if(session('sucesso'))<div class="alert alert-success">{{ session('sucesso') }}</div>@endif
@if(session('erro'))<div class="alert alert-error">{{ session('erro') }}</div>@endif
<main class="admin-main">@yield('admin-content')</main>
</body>
</html>
