<?php
namespace App\Model;
use App\Class\Estudiante;

use PDO;

class EstudianteModel
{

    public static function conectarBD():PDO{

        $dsn = "mysql:host=mariadbexamen;dbname=examenbd";
        $usuario = USUARIO_DATABASE;
        $contrasenya = PASS_DATABASE;

        $conexion = new PDO($dsn, $usuario, $contrasenya);

        return $conexion;
    }

    public static function guardarEstudiante(Estudiante $estudiante){
        $conexion = EstudianteModel::conectarBD();

        $sql = "INSERT INTO estudiante (nia, nombre, correo) 
                VALUES (:nia, :nombre, :correo)";

        $secuenciaPreparada = $conexion->prepare($sql);
        $secuenciaPreparada->bindValue(':nia', $estudiante->getNia());
        $secuenciaPreparada->bindValue(':nombre', $estudiante->getNombre());
        $secuenciaPreparada->bindValue(':correo', $estudiante->getCorreo());
        $secuenciaPreparada->execute();

    }


}