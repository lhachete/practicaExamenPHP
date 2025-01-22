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

    public static function borrarEstudiante(string $nia){
        $conexion = EstudianteModel::conectarBD();
        $sql = "DELETE FROM estudiante WHERE nia = :nia";
        $secuenciaPreparada = $conexion->prepare($sql);
        $secuenciaPreparada->bindValue(':nia', $nia);
        $secuenciaPreparada->execute();
    }


    public static function obtenerEstudiante(string $nia)
    {
        $conexion = EstudianteModel::conectarBD();
        $sql = "SELECT * FROM estudiante WHERE nia = :nia";
        $secuenciaPreparada = $conexion->prepare($sql);
        $secuenciaPreparada->bindValue(':nia', $nia);
        $secuenciaPreparada->execute();
    }
}