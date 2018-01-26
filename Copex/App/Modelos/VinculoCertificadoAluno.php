<?php

namespace App\Modelos;

use Nucleo\Entidade;

class VinculoCertificadoAluno extends Entidade {

    protected $id;
    private $certificado;
    private $aluno;
    private $situacao;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCertificado() {
        return $this->certificado;
    }

    public function setCertificado($certificado) {
        $this->certificado = $certificado;
    }

    public function getAluno() {
        return $this->aluno;
    }

    public function setAluno($aluno) {
        $this->aluno = $aluno;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }
    
    public function get($atributo) {
        return $this->$atributo;
    }

    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}

