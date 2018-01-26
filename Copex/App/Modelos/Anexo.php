<?php

namespace App\Modelos;

use Nucleo\Entidade;

class Anexo extends Entidade {

    protected $id;
    private $projeto;
    private $nome;
    private $tipo;
    private $localizacao;
    private $dataPostagem;

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
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    public function getLocalizacao() {
        return $this->localizacao;
    }

    public function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
    }

    public function getDataPostagem() {
        return $this->dataPostagem;
    }

    public function setDataPostagem($dataPostagem) {
        $this->dataPostagem = $dataPostagem;
    }

    public function get($atributo) {
        return $this->$atributo;
    }

    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}
