<?php

namespace App\Router;
use Ramsey\Uuid\Uuid;

class Router {
    private array $rutas;

    public function __construct() {
        $this->rutas = array();
    }

    public function addRoute(string $metodohttp, string $url, array|callable $accion) {
        $this->rutas[strtoupper($metodohttp)][$url] = $accion;
    }

    public function resolver(string $metodohttp, string $url = "http://localhost:8083/") {
        // Verificar si es una solicitud POST con método DELETE
        if ($metodohttp === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'delete') {
            $metodohttp = 'DELETE';
        }

        if (isset($_SERVER['QUERY_STRING'])) {
            $url = rtrim($url, "?" . $_SERVER['QUERY_STRING']);
        }

        // Comprobamos si es una ruta con API y si es quitamos de la URL el /api
        $api = $this->comprobarRutaAPI($url);

        // Lógica para crear una instancia y llamar al método de la clase
        $uriExplotada = explode('/', $url);
        $rutaTransformada = $this->cambiar_id_uri($url);
        $accion=[];
        if (isset($this->rutas[$metodohttp][$rutaTransformada])) {
            $accion = $this->rutas[$metodohttp][$rutaTransformada];
        } else {
            echo "pagina no encontrada";
                //include_once DIRECTORIO_VISTAS . "404.php";
        }

        if (is_callable($accion)) {
            // Ejecutamos una función anónima para mostrar una vista
            call_user_func($accion);
        } elseif (count($uriExplotada) > 2) {
            [$clase, $metodo] = $accion;
            $instancia = new $clase();
            call_user_func_array([$instancia, $metodo], [$uriExplotada[2], $api]);
        } else {
            [$clase, $metodo] = $accion;
            $instancia = new $clase();
            call_user_func_array([$instancia, $metodo], [$api]);
        }
    }

    private function cambiar_id_uri(string $uri): string {
        $uriArray = explode('/', $uri);
        if (count($uriArray) > 2 && Uuid::isValid($uriArray[2])) {
            $uriArray[2] = "{id}";
        }
        return implode("/", $uriArray);
    }

    public function comprobarRutaAPI(string &$url): bool {
        $rutaACachos = explode('/', $url);
        if ($rutaACachos[1] === 'api') {
            array_splice($rutaACachos, 0, 2);
            $url = '/' . implode('/', $rutaACachos);
            return true;
        }
        return false;
    }
}
