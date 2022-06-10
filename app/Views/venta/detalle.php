<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Detalles</h3>
        
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>id material</td>
                <td>id venta</td>
                <td>cantidad</td>
                <td>Monto</td>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalles as $i => $detalle) : ?>
                <tr>
                    <td><?= $i +1; ?></td>
                    <td><?= $detalle->id_material; ?></td>
                    <td><?= $detalle->id_venta; ?></td>
                    <td><?= $detalle->cantidad; ?></td>
                    <td><?= $detalle->monto; ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
    
</div>
</div>
<?php echo $this->endSection(); ?>