<?php

namespace App\Class;

class Expediente
{

    private string $referencia;
    private string $contenido;
    private \DateTime $fechaModificacion;

    public function getReferencia(): string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): Expediente
    {
        $this->referencia = $referencia;
        return $this;
    }

    public function getContenido(): string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): Expediente
    {
        $this->contenido = $contenido;
        return $this;
    }

    public function getFechaModificacion(): \DateTime
    {
        return $this->fechaModificacion;
    }

    public function setFechaModificacion(\DateTime $fechaModificacion): Expediente
    {
        $this->fechaModificacion = $fechaModificacion;
        return $this;
    }

    public function load(){

    }

    public function delete(){

    }

}