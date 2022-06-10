<?php echo $this->extend('plantilla'); ?>
<?php echo $this->section('contenido'); ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Persona</h3>
        <div class="col-auto">
            <a href="<?php echo base_url('persona/crear'); ?>" class="btn btn-primary btn-sm" title="Nuevo persona">
                <i class="bi bi-plus-circle"></i>
                Nuevo
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Num_Control</td>
                <td>Nombre</td>
                <td>Semestre</td>
                <td>Carrera</td>
                <td>Domicilio</td>
                <td>Num. Telefono</td>
                <td>Usuario</td>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $i => $persona) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $persona->num_control; ?></td>
                    <td><?= $persona->nombre; ?></td>
                    <td><?= $persona->semestre; ?></td>
                    <td><?= $persona->carrera; ?></td>
                    <td><?= $persona->domicilio; ?></td>
                    <td><?= $persona->num_tel; ?></td>
                    <td><?= $persona->usuario; ?></td>

                    <td>
                        <a href="<?php echo base_url('persona/editar/' . $persona->id_persona); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo base_url('persona/eliminar/' . $persona->id_persona); ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
</div>
<?php echo $this->endSection(); ?>