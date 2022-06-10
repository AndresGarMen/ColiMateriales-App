<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Materiales en renta</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Fecha</td>
                <td>Venta o Renta</td>
                <td>Fecha de Devolucion</td>
                <td>Persona</td>
                <td>Nombre del material</td>
            </tr>
        </thead>
        <?php foreach ($venta as $i => $venta) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $venta->fecha; ?></td>
                <td><?= $venta->venta_o_renta; ?></td>
                <td><?= $venta->fecha_devolucion ?? '-'; ?></td>
                <td><?= $venta->nomperson; ?></td>
                <td><?= $venta->nommaterial; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?= $pager->links(); ?>
</div>
</div>
<?php echo $this->endSection(); ?>