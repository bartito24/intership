<?php
require("conexion.php");
class mdl_nota
{
    public $id_pasantia;
    public $notasupervisor;
    public $notatutor;
    public $obj_con;

    function __construct()
    {
        $this->id_pasantia = 0;
        $this->notasupervisor =0;
        $this->notatutor = 0;
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        $sql = "update  pasantia set  notasupervisor=$this->notasupervisor,notatutor=$this->notatutor,estadopasantia=3";
        $this->obj_con->sin_retorno($sql);
        print_r($sql);

    }

}