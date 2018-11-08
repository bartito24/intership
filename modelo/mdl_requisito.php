<?php
require("conexion.php");
class mdl_requisito
{
    private $id_requisito;
    public $nombrerequisito;
    public $obj_con;
    function __construct()
    {
        $this->id_requisito=0;
        $this->nombrerequisito="";
        $this->obj_con=new conexion();
    }
    public function set($atributo, $valor)
    {
        $this->$atributo=$valor;

    }

    public function insertar_requisito()
    {
        $sql="insert into requisitos (nombrerequsito,activorequisito) value ('$this->nombrerequisito',1)";
        $this->obj_con->sin_retorno($sql);

    }
    public function  listar_requisito(){
        $sql="select * from requisitos";
        return $this->obj_con->con_retorno($sql);
    }
    public function  listar_paso(){
        $sql="select * from paso_plantilla";
        return $this->obj_con->con_retorno($sql);
    }
}