<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Atraso - Administração</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/geral.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/estilo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/geral.css')); ?>">
    <style type="text/tailwindcss">@theme{--color-marista:rgb(6,54,100);--color-marista2:rgb(28,149,206);}</style>
</head>
<body class="bg-marista">
<header class="admin-header">
    <a href="<?php echo e(route('admin.dashboard')); ?>"><img src="<?php echo e(asset('imagens/logo-escolas-sociais.png')); ?>" class="brand-logo" alt="Marista Escola Social Cascavel"></a>
    <div class="brand-title textos txt"><span style="color:black">SOS</span><span style="color:white">ATRASO</span></div>
    <ul id="menu" class="menu">
        <li><a href="<?php echo e(route('admin.relatorios.totais')); ?>">Total por Turmas</a></li>
        <li><a href="<?php echo e(route('admin.relatorios.index')); ?>">Relatório Alunos</a></li>
        <li><a href="<?php echo e(route('admin.alunos.index')); ?>">Alunos</a></li>
        <li><a href="<?php echo e(route('admin.usuarios.index')); ?>">Usuários</a></li>
        <li><form method="post" action="<?php echo e(route('admin.logout')); ?>"><?php echo csrf_field(); ?><button type="submit">Logoff</button></form></li>
    </ul>
</header>
<?php if(session('sucesso')): ?><div class="alert alert-success"><?php echo e(session('sucesso')); ?></div><?php endif; ?>
<?php if(session('erro')): ?><div class="alert alert-error"><?php echo e(session('erro')); ?></div><?php endif; ?>
<main class="admin-main"><?php echo $__env->yieldContent('admin-content'); ?></main>
</body>
</html>
<?php /**PATH C:\xamp\htdocs\SOS_Atraso_Laravel_layout_corrigido\SOS_Atraso_Laravel\resources\views/layouts/admin.blade.php ENDPATH**/ ?>