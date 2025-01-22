<?php
$titulo="Informacion ReserDAWtions";
include_once DIRECTORIO_VISTAS."template/inicio.php";
include_once DIRECTORIO_VISTAS."template/arribaNavegacion.php";
include_once DIRECTORIO_VISTAS."template/navegacion.php";
?>
    <section id="services" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info-box flex-column">
                        <h2 style="margin-bottom: 2rem">Crear un estudiante</h2>
                        <form method="post" action="/estudiante">
                            <label for="nia">NIA:</label>
                            <input name="nia" type="number" required>
                            <label for="nombre">Nombre:</label>
                            <input name="nombre" type="text" required>
                            <label for="correo">Correo:</label>
                            <input name="correo" type="email" required>
                            <input type="submit" value="Crear estudiante">
                        </form>

                        <h2 style="margin: 2rem 0px">Borrar un estudiante</h2>
                        <form method="post" action="/estudiante/delete">
                            <label for="nia">NIA:</label>
                            <input name="nia" type="number" required>
                            <input type="submit" value="Borrar estudiante">
                        </form>

                        <h2 style="margin: 2rem 0px">Obtener un estudiante</h2>
                        <form method="get" action="/estudiante/get">
                            <label for="nia">NIA:</label>
                            <input name="nia" type="number" required>
                            <input type="submit" value="Obtener estudiante">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>



<?php
include_once DIRECTORIO_VISTAS."template/footer.php";
include_once DIRECTORIO_VISTAS."template/modal.php";
include_once DIRECTORIO_VISTAS."template/final.php";

//<label for="nombre">Nombre:</label>
//                            <input name="nombre" type="text" required>
//                            <label for="correo">Correo:</label>
//                            <input name="correo" type="email" required>