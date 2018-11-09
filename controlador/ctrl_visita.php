<?php

require("../modelo/mdl_visita.php");

class ctrl_visita{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_visita();
    }

    public function insertar($p){
        $this->obj_mod->set("fecha" ,$p['fecha']);
        $this->obj_mod->set("observaciones" ,$p['observaciones']);
        $this->obj_mod->set("latitud" ,$p['latitud']);
        $this->obj_mod->set("longitud" ,$p['longitud']);
        $this->obj_mod->set("fecha" ,$p['fecha']);
        $this->obj_mod->set("id_estudiante" ,$p['id_estudiante']);
        $this->obj_mod->insertar();
    }
}
?>