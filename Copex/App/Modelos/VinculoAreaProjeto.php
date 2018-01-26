<?php

namespace App\Modelos;

use Nucleo\Entidade;

class VinculoAreaProjeto extends Entidade{

    protected $id;
    private $projeto;
    private $tipoArea;
    private $area;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getProjeto() {
        return $this->projeto;
    }

    public function setProjeto($projeto) {
        $this->projeto = $projeto;
    }
    
    public function getTipoArea() {
        return $this->tipoArea;
    }

    public function setTipoArea($tipoArea) {
        $this->tipoArea = $tipoArea;
    }

    public function getArea() {
        return $this->area;
    }

    public function setArea($area) {
        $this->area = $area;
    }
    
     public function get($atributo) {
        return $this->$atributo;
    }
    
    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}

