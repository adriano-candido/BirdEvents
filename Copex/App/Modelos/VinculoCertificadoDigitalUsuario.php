<?php

namespace App\Modelos;

use Nucleo\Entidade;

class VinculoCertificadoDigitalUsuario extends Entidade {

    protected $id;
    private $certificado;
    private $usuario;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCertificado() {
        return $this->certificado;
    }

    public function setCertificado($certificado) {
        $this->certificado = $certificado;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    
    public function get($atributo) {
        return $this->$atributo;
    }

    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}

