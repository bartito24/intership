<?php

require("../modelo/mdl_cuadernillo.php");

class ctrl_cuadernillo{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_cuadernillo();
    }

    public function insertar($p){
        //print_r($p);
        $this->obj_mod->set("fecha" ,$p['fecha']);
        $this->obj_mod->set("descripcion" ,$p['descripcion']);
        $this->obj_mod->insertar();
    }
}