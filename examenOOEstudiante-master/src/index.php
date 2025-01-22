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


//Rutas enlazadas a controladores, lógica de la aplicación
//Usuarios
//$router->addRoute('get','/users',[\App\Controller\UsuarioController::class,'index']);


//Usuario API
//$router->addRoute('post','/api/users/{id}',[\App\Controller\UsuarioController::class,'store']);

$router->resolver($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

