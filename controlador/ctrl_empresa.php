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
        $this->obj_mod->set("area" ,$p['area']);
        $this->obj_mod->set("funciones" ,$p['funciones']);
        $this->obj_mod->set("nombresupervisor" ,$p['nombresupervisor']);
        $this->obj_mod->set("celsupervisor" ,$p['celsupervisor']);
        $this->obj_mod->set("correosupervisor" ,$p['correosupervisor']);
        $this->obj_mod->insertar();
    }
    public function modificar($p){
        $this->obj_mod->set("nombre" ,$p['nombre']);
        $this->obj_mod->set("direccion" ,$p['direccion']);
        $this->obj_mod->set("telefono" ,$p['telefono']);
        $this->obj_mod->set("area" ,$p['area']);
        $this->obj_mod->set("funciones" ,$p['funciones']);
        $this->obj_mod->set("nombresupervisor" ,$p['nombresupervisor']);
        $this->obj_mod->set("celsupervisor" ,$p['celsupervisor']);
        $this->obj_mod->set("correosupervisor" ,$p['correosupervisor']);
        $this->obj_mod->set("id_empresa" ,$p['id_empresa']);
        $this->obj_mod->modificar();
    }
public function eliminar($id){
    $this->obj_mod->Eliminar($id);
}
}
