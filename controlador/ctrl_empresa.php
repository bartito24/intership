<?php

require("../modelo/mdl_empresa.php");

class ctrl_empresa{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_empresa();
    }

    public function insertar($p){
        print_r($p);
        $this->obj_mod->set("nombre" ,$p['nombre']);
        $this->obj_mod->set("direccion" ,$p['direccion']);
        $this->obj_mod->set("telefono" ,$p['telefono']);
        $this->obj_mod->set("nombrerep" ,$p['nombrerep']);
        $this->obj_mod->set("apellidorep" ,$p['apellidorep']);
        $this->obj_mod->set("celular" ,$p['celular']);
        $this->obj_mod->insertar();
    }
    public function modificar($p){
        $this->obj_mod->set("nombre" ,$p['nombre']);
        $this->obj_mod->set("direccion" ,$p['direccion']);
        $this->obj_mod->set("telefono" ,$p['telefono']);
        $this->obj_mod->set("nombrerep" ,$p['nombrerep']);
        $this->obj_mod->set("apellidorep" ,$p['apellidorep']);
        $this->obj_mod->set("celular" ,$p['celular']);
        $this->obj_mod->set("id_empresa" ,$p['id_empresa']);
        $this->obj_mod->modificar();
    }
public function eliminar($id){
    $this->obj_mod->Eliminar($id);
}
}
