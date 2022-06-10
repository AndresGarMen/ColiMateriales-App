<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nuevo Material</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar material">
                Registrar
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('material/registrar'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input required type="text" minlength="1" maxlength="50" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="marca" class="form-label">Marca</label>
            <input required type="text" class="form-control" name="marca" id="marca">
        </div>
        <div class="col-md-6">
            <label for="existencias" class="form-label">Existencias</label>
            <input required type="number" value="1" min="1" max="100" class="form-control" name="existencias" id="existencias">
        </div>
        <div class="col-md-6">
            <label for="dimensiones" class="form-label">Dimensiones</label>
            <input required type="text" class="form-control" name="dimensiones" id="dimensiones">
        </div>
        <div class="col-md-6">
            <label for="precio" class="form-label">Precio</label>
            <input required type="money" class="form-control" name="precio" id="precio">
        </div>
        <div class="col-md-6">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input required type="text" minlength="1" maxlength="50" class="form-control" name="descripcion" id="descripcion">
        </div>

    </form>
</div>
<?= $this->endSection() ?>