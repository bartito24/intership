<?php

require("../modelo/mdl_nota.php");

class ctrl_nota{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_nota();
    }

    public function insertar($p){
        print_r($p);
        $this->obj_mod->set("notasupervisor" ,$p['notasupervisor']);
        $this->obj_mod->set("id_estudiante" ,$p['id_estudiante']);
        $this->obj_mod->set("notatutor" ,$p['notatutor']);
        $this->obj_mod->insertar();
    }

}
