<?php

namespace App\Modelos;

use Nucleo\Entidade;

class Observacao extends Entidade {

    protected $id;
    private $projeto;
    private $usuario;
    private $dataPostagem;
    private $conteudo;
    private $mapa = [];

    public function __construct() {
        $this->mapa['projeto'] = 'projeto';
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

    public function getProjeto() {
        return $this->id;
    }

    public function setProjeto($projeto) {
        $this->projeto = $projeto;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getDataPostagem() {
        return $this->dataPostagem;
    }

    public function setDataPostagem($dataPostagem) {
        $this->dataPostagem = $dataPostagem;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    public function get($atributo) {
        return $this->$atributo;
    }

    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}
