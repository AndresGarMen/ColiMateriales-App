<?= $this->extend('plantilla') ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nuevo Venta</h3>
        <div class="col-auto">
            <button form="form" class="btn btn-primary btn-sm" title="Registrar empleado">
                Registrar
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('venta/registrar'); ?>" method="post" class="row g-3" id="form">
        <div class="col-md-6">
            <label for="venta_o_renta" class="form-label">Es venta o renta</label>
            <select required class="form-select" aria-label="Selección de puesto de empleado" name="venta_o_renta" id="venta_o_renta">
                <option selected value="Venta">Venta</option>
                <option value="Renta">Renta</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="fecha_devolucion" class="form-label">Fecha de devolucion</label>
            <input required type="date" class="form-control" name="fecha_devolucion" id="fecha_devolucion">
        </div>
        <div class="col-md-6">
            <label for="total" class="form-label">Total</label>
            <input required readonly value="0.00" data-name='input-total' type="text" class="form-control" name="total" id="total" disabled>
        </div>

        <div class="my-3">
            <fieldset>
                <legend>Opciones</legend>
                <div class="col-3">
                    <select data-name="sel-materiales" class="form-select" required>
                        <option value="" precio="0" selected disabled>Seleccionar</option>
                        <?php foreach ($material as $producto) : ?>
                            <option data-id="<?= $producto->id_material ?>" stock="<?= $producto->existencias ?>" precio="<?= $producto->precio ?>" value="<?= $producto->id_material ?>"><?= $producto->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-outline-primary btn-sm button">Enviar</button>
                <button type="button" data-name="btn-agregar" class="btn btn-outline-success btn-sm">+</button>
            </fieldset>
        </div>
        <fieldset>
            <legend>Productos</legend>
            <div data-name="lista-materiales" class="g-3 mb-3"></div>
        </fieldset>

        <template data-name="plantilla-producto">
            <div data-name="div-producto" class="row g-3 mb-2">
                <div class="col-4">
                    <input data-name="input-producto" type="text" class="form-control" disabled>
                </div>
                <div data-name="div-input" class="col-1">
                    <input data-name="input-cantidad" onchange="calcularTotal()" type="number" value="1" min="1" class="form-control" required>
                </div>
                <input data-name="input-id" type="hidden" name="id_producto">
                <input data-name="input-precio" type="hidden" name="precio_venta">
                <button data-name="btn-remover" onclick="clickBntRemover(event)" type="button" class="btn btn-danger col-auto">-</button>
            </div>
        </template>

        <script>
            // VARIABLES
            let btnAgregar = document.querySelector("[data-name='btn-agregar']");
            let selectMateriales = document.querySelector("[data-name='sel-materiales']");
            let listaMateriales = document.querySelector("[data-name='lista-materiales']");
            let contadorMateriales = 0;

            // EVENTOS
            btnAgregar.addEventListener('click', clickBntAgregar);

            // FUNCIONES
            function clickBntAgregar() {
                if (selectMateriales.value == '') return;
                let stock = selectMateriales.options[selectMateriales.selectedIndex].getAttribute('stock');
                let precio = selectMateriales.options[selectMateriales.selectedIndex].getAttribute('precio');
                let nombre = selectMateriales.options[selectMateriales.selectedIndex].text;
                let id = selectMateriales.options[selectMateriales.selectedIndex].getAttribute('data-id')
                insertarMaterial(stock, precio, nombre, id);
            }

            function clickBntRemover(event) {
                event.target.closest("[data-name='div-producto']").remove();
                let id = event.target.getAttribute('data-id');
                document.querySelector(`option[data-id="${id}"]`).removeAttribute('disabled');
                calcularTotal()
            }

            function calcularTotal() {
                let productos = document.querySelectorAll("[data-name='input-cantidad']");
                let inputTotal = document.querySelector("[data-name='input-total']");
                let total = 0;
                productos.forEach((producto) => {
                    let precio = producto.getAttribute("data-precio");
                    let cantidad = producto.value;
                    total = total + (precio * cantidad);
                });
                inputTotal.value = parseFloat(total).toFixed(2);
            }

            function insertarMaterial(stock, precio, nombre, id) {
                // Buscar otra manera de añadir filas a la tabla porque el
                // elemento template no está soportado.
                if (!('content' in document.createElement('template'))) return;
                if (selectMateriales.options[selectMateriales.selectedIndex].disabled) return;

                let plantilla = document.querySelector('[data-name="plantilla-producto"]');
                let contenido = document.importNode(plantilla.content, true);
                let inputProducto = contenido.querySelector("[data-name='input-producto']");
                let inputCantidad = contenido.querySelector("[data-name='input-cantidad']");
                let inputPrecio = contenido.querySelector("[data-name='input-precio']");
                let inputId = contenido.querySelector("[data-name='input-id']");
                let btnRemover = contenido.querySelector("[data-name='btn-remover']");

                inputPrecio.setAttribute("name", `productos[${parseInt(contadorMateriales)}][precio_venta]`);
                inputCantidad.setAttribute("name", `productos[${parseInt(contadorMateriales)}][cantidad]`);
                inputId.setAttribute("name", `productos[${parseInt(contadorMateriales)}][id_producto]`);
                inputCantidad.setAttribute("data-precio", precio);
                inputId.value = id;
                inputPrecio.value = precio;
                inputProducto.value = nombre;
                inputCantidad.max = stock;

                btnRemover.setAttribute("data-id", id);

                listaMateriales.appendChild(contenido);

                contadorMateriales++;

                selectMateriales.options[selectMateriales.selectedIndex].setAttribute('disabled', true);

                calcularTotal();
            }
        </script>


</div>

</form>
</div>
<?= $this->endSection() ?>