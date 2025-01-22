<?php

include_once "environment.php";
include_once "vendor/autoload.php";

use App\Router\Router;
use App\Class\Estudiante;


$router = new Router();


//Rutas de páginas estáticas
$router->addRoute('get','/',function(){
    include_once DIRECTORIO_VISTAS."informacion.php";
});

$router->addRoute('post','/estudiante',function(){
    $estudiante = new Estudiante();

    $estudiante->setNombre($_POST['nombre']);
    $estudiante->setNia($_POST['nia']);
    $estudiante->setCorreo($_POST['correo']);

    $estudiante->save();
});

$router->addRoute('post', '/estudiante/delete', function() {
    //var_dump($_POST); // Esto ayuda a verificar si los datos son recibidos correctamente
    $nia = $_POST['nia'];

    if (!is_null($nia)) {
        \App\Model\EstudianteModel::borrarEstudiante($nia);
    } else {
        echo "Introduce un NIA";
    }
});



//$router->addRoute('delete','/estudiante/{id}',[\App\Controller\EstudianteController::class,'destroy']);


$router->resolver($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

