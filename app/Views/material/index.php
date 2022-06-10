<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Material</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('material/crear'); ?>" class="btn btn-primary btn-sm" title="Nuevo material">
                <i class="bi bi-plus-circle"></i>
                Nuevo
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Nom Material</td>
                <td>Marca</td>
                <td>Existencias</td>
                <td>Dimensiones</td>
                <td>Precio</td>
                <td>Descripcion</td>
                <td>Persona</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($material as $i => $material) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $material->nombre; ?></td>
                    <td><?= $material->marca; ?></td>
                    <td><?= $material->existencias; ?></td>
                    <td><?= $material->dimensiones; ?></td>
                    <td><?= $material->precio; ?></td>
                    <td><?= $material->descripcion; ?></td>
                    <td><?= $material->nomperson; ?></td>
                    <td>
                        <a href="<?php echo base_url('material/editar/' . $material->id_material); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo base_url('material/eliminar/' . $material->id_material); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>
<?php echo $this->endSection(); ?>