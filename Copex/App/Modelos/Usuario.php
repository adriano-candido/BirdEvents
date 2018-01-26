<?php

namespace App\Modelos;

use Nucleo\Entidade;

class Usuario extends Entidade{

    protected $id;
    private $nome;
    private $cpf;
    private $senha;
    private $tipoAcesso;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setTipoAcesso($tipoAcesso) {
        $this->tipoAcesso = $tipoAcesso;
    }

    public function getTipoAcesso() {
        return $this->tipoAcesso;
    }
    
    public function get($atributo) {
        return $this->$atributo;
    }
    
    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}
