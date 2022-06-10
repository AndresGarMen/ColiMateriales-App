<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Comprar Material</h3>
        
    </div>
    <form action="<?php echo base_url('material/registrar'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="fecha" class="form-label">Fecha</label>
            <input required type="datetime-local" size="5" class="form-control" name="fecha" id="fecha">
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Material</label>
            <select required class= "form-select" aria-label="Seleccion de materiales" name="nombre" id="nombre">
                <option disable selected value="">Seleccionar</option>
                <?php foreach ($material as $i) : ?>
                    <option value="<?php echo $i ->id_material; ?>"><?php echo $i->nombre; ?></option>
                    <?php endforeach; ?>
            </select>
            <input required type="text" size="5" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="marca" class="form-label">Marca</label>
            <input required type="text" class="form-control" name="marca" id="marca">
        </div>
        <div class="col-md-6">
            <label for="estado" class="form-label">Cantidad</label>
            <input required type= "" class="form-control" name="estado" id="estado">
        </div>
        <div class="col-md-6">
            <label for="precio" class="form-label">Precio</label>
            <input required type="text" class="form-control" name="precio" id="precio">
        </div>
        <div class="col-md-6">
            <label for="id_persona" class="form-label">ID de persona</label>
            <input required type="text" class="form-control" name="id_persona" id=" id_persona">
        </div>
        <div class="col-md-6">
            <label for="fecha_devolucion" class="form-label">Fecha devolucion</label>
            <input required type="datetime-local" class="form-control" name="fecha_devolucion" id="fecha_devolucion">
        </div>
    </form>
    <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Comprar material" style="background-color: green">
                Comprar
            </button>
        </div>
</div>
<?= $this->endSection() ?>