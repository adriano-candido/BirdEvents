<?php

namespace App\Modelos;

use Nucleo\Entidade;

class Certificado extends Entidade {

    protected $id;
    private $nome;
    private $caixaReferente;
    private $anoExercicio;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCaixaReferente() {
        return $this->caixaReferente;
    }

    public function setCaixaReferente($caixaReferente) {
        $this->caixaReferente = $caixaReferente;
    }
    
    public function getAnoExercicio() {
        return $this->anoExercicio;
    }

    public function setAnoExercicio($anoExercicio) {
        $this->anoExercicio = $anoExercicio;
    }

    public function get($atributo) {
        return $this->$atributo;
    }

    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}
