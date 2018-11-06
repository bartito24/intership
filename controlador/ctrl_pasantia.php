<?php

require("../modelo/mdl_pasantia.php");

class ctrl_pasantia{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_pasantia();
    }

    public function insertar($p){
        print_r($p);
        $this->obj_mod->set("empresa" ,$p['empresa']);
        $this->obj_mod->set("area" ,$p['area']);
        $this->obj_mod->set("descripcion" ,$p['descripcion']);
        $this->obj_mod->set("asignatura" ,$p['asignatura']);
        $this->obj_mod->set("estudiante" ,$p['estudiante']);
        $this->obj_mod->set("fechainicio" ,$p['fechainicio']);
        $this->obj_mod->set("gestion" ,$p['gestion']);
        $this->obj_mod->insertar();
    }
    public function modificar($p){
        $this->obj_mod->set("empresa" ,$p['empresa']);
        $this->obj_mod->set("area" ,$p['area']);
        $this->obj_mod->set("descripcion" ,$p['descripcion']);
        $this->obj_mod->set("asignatura" ,$p['asignatura']);
        $this->obj_mod->set("estudiante" ,$p['estudiante']);
        $this->obj_mod->set("fechainicio" ,$p['fechainicio']);
        $this->obj_mod->set("gestion" ,$p['gestion']);
        $this->obj_mod->set("id_pasantia" ,$p['id_pasantia']);
        $this->obj_mod->modificar();
    }
public function eliminar($id){
    $this->obj_mod->Eliminar($id);
}
}
