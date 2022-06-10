<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Materiales pedidos o rentados</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Fecha</td>
                <td>Estado</td>
                <td>Fecha de Devolucion</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venta as $i => $venta) : ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $venta->fecha; ?></td>
                    <td><?= $venta->venta_o_renta; ?></td>
                    <td><?= $venta->fecha_devolucion ?? '-'; ?></td>
                    <td><?= $venta->montototal; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>
<?php echo $this->endSection(); ?>