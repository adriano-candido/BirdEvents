<?php

namespace App\Modelos;

use Nucleo\Entidade;

class CertificadoDigital extends Entidade {

    protected $id;
    private $nome;
    private $texto;
    private $imagem;
    private $projeto;

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

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }
    
    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    
    public function getProjeto() {
        return $this->projeto;
    }

    public function setProjeto($projeto) {
        $this->projeto = $projeto;
    }

    public function get($atributo) {
        return $this->$atributo;
    }

    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}
