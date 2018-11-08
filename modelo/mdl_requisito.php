<?php
require("conexion.php");
class mdl_requisito
{
    private $id_requisitos;
    public $nombrerequisito;
    public $obj_con;
    function __construct()
    {
        $this->id_requisitos=0;
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
        $sql="select * from requisitos where activorequisito=1" ;
        return $this->obj_con->con_retorno($sql);
    }
    public function  listar_paso(){
        $sql="select * from paso_plantilla";
        return $this->obj_con->con_retorno($sql);
    }

    public function eliminar($id)
    {
        $sql = "UPDATE requisitos SET activorequisito=0 where id_requisitos=$id;";
        $this->obj_con->sin_retorno($sql);
    }

    public function modificar()
    {
        $sql="UPDATE requisitos SET nombrerequsito='$this->nombrerequisito'  where id_requisitos='$this->id_requisitos'";
        $this->obj_con->sin_retorno($sql);
    print_r($sql);
    }
}