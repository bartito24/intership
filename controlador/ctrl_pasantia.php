<?php

require("../modelo/mdl_pasantia.php");

class ctrl_pasantia{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_pasantia();
    }

    public function insertar($p){
        print_r($p);
        $this->obj_mod->set("nombre" ,$p['nombre']);
        $this->obj_mod->set("direccion" ,$p['direccion']);
        $this->obj_mod->set("telefono" ,$p['telefono']);
        $this->obj_mod->insertar();
    }
    public function modificar($p){
        $this->obj_mod->set("nombre" ,$p['nombre']);
        $this->obj_mod->set("direccion" ,$p['direccion']);
        $this->obj_mod->set("telefono" ,$p['telefono']);
        $this->obj_mod->set("id_empresa" ,$p['id_empresa']);
        $this->obj_mod->modificar();
    }
public function eliminar($id){
    $this->obj_mod->Eliminar($id);
}
}
