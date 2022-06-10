<h1>Empleados</h1>
<!-- Inicio Contenido -->

<!-- DIV para un contenido o header de presentacion -->
<div class=" container text-center">
    <img class="d-block mx-auto mb-4" src="<?= base_url('img/TUIMAGEN.png') ?>" alt="" width="326" height="182">
    <h3 class="uppercase">TU APP NAME</h3>
</div>

<!-- DIV para contenido de ka app [tablas, forms, etc.] -->
<div class="container  px-4  gy-5">
    <h4>Tabla empleados</h4>
    <button class="btn btn-primary">Registrar empleados</button>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>


<div id="result">

</div>
<!-- Fin Contenido -->

<script>
    window.onload = myFunction;

    function myFunction() {
        console.log("hola");
        /*
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("demo").innerHTML = this.responseText;
            }
            xhttp.open("POST", "demo_post.asp");
            xhttp.send();

            */
    }
</script>