<?php

require("../modelo/mdl_asignatura.php");

class ctrl_asignatura{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_asignatura();
    }

    public function insertar($p){
        //print_r($p);
        $this->obj_mod->set("nombreasignatura" ,$p['nombreasignatura']);
        $this->obj_mod->set("nivel" ,$p['nivel']);
        $this->obj_mod->set("descripcionasig" ,$p['descripcionasig']);
        $this->obj_mod->insertar();
    }
    public function modificar($p){
        //print_r($p);
        $this->obj_mod->set("nombreasignatura" ,$p['nombreasignatura']);
        $this->obj_mod->set("nivel" ,$p['nivel']);
        $this->obj_mod->set("descripcionasig" ,$p['descripcionasig']);
        $this->obj_mod->set("id_asignatura" ,$p['id_asignatura']);
        $this->obj_mod->modificar();
        
    }
    public function eliminar($id){
        $this->obj_mod->Eliminar($id);
    }
}
