<?php $__env->startSection('admin-content'); ?>
<section class="admin-card">
    <h1 class="admin-title">ALUNOS</h1>
    <div class="admin-toolbar">
        <form class="admin-search" method="get" action="<?php echo e(route('admin.alunos.index')); ?>">
            <input class="border border-gray-400 p-3" name="busca_nome" value="<?php echo e($q); ?>" placeholder="Buscar pelo nome">
            <button class="admin-btn admin-btn-dark" type="submit">BUSCAR</button>
        </form>
        <a class="admin-btn" href="<?php echo e(route('admin.alunos.create')); ?>">ADICIONAR ALUNO</a>
    </div>
    <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.alunos.importar')); ?>" class="import-form">
        <?php echo csrf_field(); ?>
        <input type="file" name="arquivo" required>
        <button class="admin-btn" type="submit">IMPORTAR PLANILHA</button>
    </form>
    <div class="table-wrap">
        <table class="admin-table">
            <thead><tr><th>Nome</th><th>Turma</th><th>Matrícula</th><th>Ações</th></tr></thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $alunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr><td><?php echo e($a->nome); ?></td><td><?php echo e($a->turma); ?></td><td><?php echo e($a->matricula); ?></td><td><div class="actions-cell"><a class="text-blue-500 underline" href="<?php echo e(route('admin.alunos.edit',$a)); ?>">Editar</a><form method="post" action="<?php echo e(route('admin.alunos.destroy',$a)); ?>" onsubmit="return confirm('Excluir aluno?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="admin-btn-danger" type="submit">Excluir</button></form></div></td></tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4">Nenhum aluno encontrado.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php echo e($alunos->links()); ?>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamp\htdocs\SOS_Atraso_Laravel_layout_corrigido\SOS_Atraso_Laravel\resources\views/admin/alunos/index.blade.php ENDPATH**/ ?>