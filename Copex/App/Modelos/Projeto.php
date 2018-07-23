<?php

namespace App\Modelos;

use Nucleo\Entidade;

class Projeto extends Entidade {

    protected $id;
    private $nome;
    private $tipo;
    private $tipoSubmissao;
    private $usuario;
    private $descricao;
    private $inicioInscricao;
    private $finalInscricao;
    private $inicioOcorrencia;
    private $finalOcorrencia;
    private $situacao;
    private $abrirInscricao;
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
    
    public function getTipoSubmissao() {
        return $this->tipoSubmissao;
    }

    public function setTipoSubmissao($tipoSubmissao) {
        $this->tipoSubmissao = $tipoSubmissao;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getInicioInscricao() {
        return $this->inicioInscricao;
    }

    public function setInicioInscricao($inicioInscricao) {
        $this->inicioInscricao = $inicioInscricao;
    }

    public function getFinalInscricao() {
        return $this->finalInscricao;
    }

    public function setFinalInscricao($finalInscricao) {
        $this->finalInscricao = $finalInscricao;
    }

    public function getInicioOcorrencia() {
        return $this->inicioOcorrencia;
    }

    public function setInicioOcorrencia($inicioOcorrencia) {
        $this->inicioOcorrencia = $inicioOcorrencia;
    }

    public function getFinalOcorrencia() {
        return $this->finalOcorrencia;
    }

    public function setFinalOcorrencia($finalOcorrencia) {
        $this->finalOcorrencia = $finalOcorrencia;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    
    public function getAbrirInscricao() {
        return $this->abrirInscricao;
    }

    public function setAbrirInscricao($abrirInscricao) {
        $this->abrirInscricao = $abrirInscricao;
    }

    
    public function get($atributo) {
        return $this->$atributo;
    }

    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}
