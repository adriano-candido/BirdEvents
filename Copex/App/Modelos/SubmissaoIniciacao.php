<?php

namespace App\Modelos;

use Nucleo\Entidade;

class SubmissaoIniciacao extends Entidade{

    protected $id;
    private $titulo;
    private $resumo;
    private $autores;
    private $anexo;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getResumo() {
        return $this->resumo;
    }

    public function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    public function getAutores() {
        return $this->autores;
    }

    public function setAutores($autores) {
        $this->autores = $autores;
    }

    public function getAnexo() {
        return $this->anexo;
    }

    public function setAnexo($anexo) {
        $this->anexo = $anexo;
    }
    
     public function get($atributo) {
        return $this->$atributo;
    }
    
    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}
