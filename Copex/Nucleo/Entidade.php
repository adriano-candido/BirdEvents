<?php

namespace Nucleo;

abstract class Entidade {
    protected $id;
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public abstract function get($atributo);
    
    public abstract function set($atributo, $valor);
}
