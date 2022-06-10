<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nueva Persona</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar persona">
                Registrar
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('persona/registrar'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="num_control" class="form-label">Numero de Control</label>
            <input required type="number" min="10000000" max="99999999" class="form-control" name="num_control" id="num_control">
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input required type="text" minlength="3" maxlength="100" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="semestre" class="form-label">Semestre</label>
            <input required type="number" value="1" min="1" max="12" class="form-control" name="semestre" id="semestre">
        </div>
        <div class="col-md-6">
            <label for="carrera" class="form-label">Carrera</label>
            <select required class="form-select" aria-label="Seleccióne su carrera" name="carrera" id="carrera">
                <option selected value="INGENIERÍA EN INFORMÁTICA">INGENIERÍA EN INFORMÁTICA</option>
                <option value="ARQUITECTURA">ARQUITECTURA</option>
                <option value="INGENIERÍA AMBIENTAL">INGENIERÍA AMBIENTAL</option>
                <option value="INGENIERÍA BIOQUÍMICA">INGENIERÍA BIOQUÍMICA</option>
                <option value="CONTADOR PÚBLICO">CONTADOR PÚBLICO</option>
                <option value="INGENIERÍA EN GESTIÓN EMPRESARIAL">INGENIERÍA EN GESTIÓN EMPRESARIAL</option>
                <option value="INGENIERÍA EN SISTEMAS COMPUTACIONALES">INGENIERÍA EN SISTEMAS COMPUTACIONALES</option>
                <option value="INGENIERÍA INDUSTRIAL">INGENIERÍA INDUSTRIAL</option>
                <option value="INGENIERÍA MECATRÓNICA">INGENIERÍA MECATRÓNICA</option>
                <option value="LICENCIATURA EN ADMINISTRACIÓN">LICENCIATURA EN ADMINISTRACIÓN</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input required type="text" minlength="5" maxlength="80" class="form-control" name="domicilio" id="domicilio">
        </div>
        <div class="col-md-6">
            <label for="num_tel" class="form-label">Numero de Telefono</label>
            <input required type="tel" minlength="10" maxlength="10" class="form-control" name="num_tel" id="num_tel">
        </div>
        <div class="col-md-6">
            <label for="usuario" class="form-label">Usuario</label>
            <input required type="text" minlength="5" maxlength="20" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="col-md-6">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input required type="text" minlength="8" maxlength="8" class="form-control" name="contrasena" id="contrasena">
        </div>
    </form>
</div>
<?= $this->endSection() ?>