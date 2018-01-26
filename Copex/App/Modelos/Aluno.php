<?php

namespace App\Modelos;

use Nucleo\Entidade;

class Aluno extends Entidade{

    protected $id;
    private $usuario;
    private $matricula;
    private $curso;
    private $mapa = [];

    public function __construct() {
        $this->mapa['curso'] = 'curso';
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

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }

    public function get($atributo) {
        return $this->$atributo;
    }
    
    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}
