<?php

require("../modelo/mdl_documentacion.php");

class ctrl_documentacion{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_documentacion();
    }

    public function insertar($p){
        //print_r($p);
        $this->obj_mod->set("nombredoc" ,$p['nombredoc']);
        $this->obj_mod->set("fechaentrega" ,$p['fechaentrega']);
        $this->obj_mod->set("respaldo" ,$p['respaldo']);
        $this->obj_mod->insertar();
    }
    public function modificar($p){
        //print_r($p);
        $this->obj_mod->set("nombredoc" ,$p['nombredoc']);
        $this->obj_mod->set("fechaentrega" ,$p['fechaentrega']);
        $this->obj_mod->set("respaldo" ,$p['respaldo']);
        $this->obj_mod->set("id_documentacion" ,$p['id_documentacion']);
        $this->obj_mod->modificar();
    }
public function eliminar($id){
    $this->obj_mod->Eliminar($id_documentacion);
}
}
