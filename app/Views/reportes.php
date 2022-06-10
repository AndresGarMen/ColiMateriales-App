<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contenido'); ?>
<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<!-- DIV para un contenido o header de presentacion -->
<div class="container">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Reportes</h3>
    </div>
    <div class="row my-3 mx-1 gap-2">
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Materiales en renta</h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte</h6>
                <p class="card-text">Los materiales actualmente en renta con su fecha de salida, entrega y nombre de la persona.</p>
                <a href="<?= base_url('/reportes/materiales-renta'); ?>" class="btn btn-primary btn-sm">Ver reportes</a>
            </div>
        </div>
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Historial de Usuarios</h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte</h6>
                <p class="card-text">Historico de los materiales que ha rentado y/o comprado una persona, con nombre del material y fecha de renta o venta.</p>
                <a href="<?= base_url('/reportes/historial-usuarios'); ?>" class="btn btn-primary btn-sm">Ver reportes</a>
            </div>
        </div>
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Materiales pedidos o rentados</h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte</h6>
                <p class="card-text">La relacion de materiales pedidos o rentados en cierta fecha con su respectivo importe y suma de esos importes.</p>
                <a href="<?= base_url('/reportes/materiales-pedidos-rentados'); ?>" class="btn btn-primary btn-sm">Ver reportes</a>
            </div>
        </div>
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Dueños del material</h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte</h6>
                <p class="card-text">La relacion de materiales que ha colocado para venta o renta una persona.</p>
                <a href="<?= base_url('/reportes/dueño-material'); ?>" class="btn btn-primary btn-sm">Ver reportes</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?php echo $this->endSection(); ?>