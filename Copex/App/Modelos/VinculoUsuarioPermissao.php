<?php

namespace App\Modelos;

use Nucleo\Entidade;

class VinculoUsuarioPermissao extends Entidade {

    protected $id;
    private $usuario;
    private $permissao;

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

    public function getPermissao() {
        return $this->permissao;
    }

    public function setPermissao($permissao) {
        $this->permissao  = $permissao;
    }
    
    public function get($atributo) {
        return $this->$atributo;
    }

    public function set($atributo, $valor) {
        return $this->$atributo = $valor;
    }

}

