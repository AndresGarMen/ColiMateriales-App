<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Venta</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('venta/crear'); ?>" class="btn btn-primary btn-sm" title="Nuevo venta">
                <i class="bi bi-plus-circle"></i>
                Nuevo
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Fecha</td>
                <td>Venta o Renta</td>
                <td>Fecha de Devolucion</td>
                <td>Total</td>
                <td>Id Persona</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venta as $i => $venta) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $venta->fecha; ?></td>
                    <td><?= $venta->venta_o_renta; ?></td>
                    <td><?= $venta->fecha_devolucion ?? '-'; ?></td>
                    <td><?= $venta->montototal; ?></td>
                    <td><?= $venta->id_persona; ?></td>
                    <td>
                        <a href="<?php echo base_url('venta/editar/' . $venta->id_venta); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo base_url('venta/eliminar/' . $venta->id_venta); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                        <a href="<?php echo base_url('venta/detalle/' . $venta->id_venta); ?>" class="btn btn-outline-danger btn-sm">Ver Detalle</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>
<?php echo $this->endSection(); ?>