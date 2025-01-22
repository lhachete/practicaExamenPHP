<?php
namespace App\Class;
use JsonSerializable;
use App\Model\EstudianteModel;

class Estudiante implements JsonSerializable
{

    private int $nia;
    private string $nombre;
    private string $correo;
    private \Expediente $expediente;

    public function getNia(): int
    {
        return $this->nia;
    }

    public function setNia(int $nia): Estudiante
    {
        $this->nia = $nia;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Estudiante
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): Estudiante
    {
        $this->correo = $correo;
        return $this;
    }

    public function getExpediente(): Expediente
    {
        return $this->expediente;
    }

    public function setExpediente(Expediente $expediente): Estudiante
    {
        $this->expediente = $expediente;
        return $this;
    }

    public function save(){
        EstudianteModel::guardarEstudiante($this);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): mixed
    {
        return [
            'nia' => $this->nia,
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'expediente' => $this->expediente
        ];
    }
}