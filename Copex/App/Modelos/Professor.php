<?php

namespace App\Modelos;

use Nucleo\Entidade;

class Professor extends Entidade{

    protected $id;
    private $usuario;
    private $titulacao;
    private $mapa = [];

    public function __construct() {
        $this->mapa['usuario'] = 'usuario';
    }

    public function getMapa() {
        return $this->mapa;
    }

    public function setMapa($mapa) {
        $this->mapa = $mapa;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
     public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getTitulacao() {
        return $this->titulacao;
    }

    public function setTitulacao($titulacao) {
        $this->titulacao = $titulacao;
    }

    public function get($atributo) {
        return $this->$atributo;
    }
    
    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }
}
