<?php
require("conexion.php");
class mdl_nota
{
    public $id_pasantia;
    public $notasupervisor;
    public $id_estudiante;
    public $notatutor;
    public $obj_con;

    function __construct()
    {
        $this->id_estudiante = 0;
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
        $condicion="";
        $notafinal=0;
        $notafinal=($this->notasupervisor+$this->notatutor)/2;
        if($notafinal>=61){
            $condicion="Aprobado";
    }
    else{
            $condicion="Reprobado";
    }
        date_default_timezone_set('America/Boa_Vista');
        $fecha= strftime("%Y-%m-%d");
        $sql = "update  pasantia set  notasupervisor=$this->notasupervisor,notatutor=$this->notatutor,estadopasantia=3, notafinal=$notafinal, observacionp='$condicion', fechafin='$fecha' where estudiante_id_estudiante=$this->id_estudiante";
        $this->obj_con->sin_retorno($sql);
        echo "<script> window.location.href='../admin/docs/listar_pasantia.php';</script>";
    }

}