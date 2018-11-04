<?php

require("../modelo/mdl_cursoexterno.php");

class ctrlcurso{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_curso();
    }

    public function insertar($p){
        $this->obj_mod->set("nombre" ,$p['nombre']);
        $this->obj_mod->insertar();
    }
}
?>