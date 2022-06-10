<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Dueños x Material</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Nombre de los Materiales</td>
                <td>Dueños</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($material as $i => $duematerial) : ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $duematerial->nombre; ?></td>
                    <td><?= $duematerial->nomperson; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>
<?php echo $this->endSection(); ?>