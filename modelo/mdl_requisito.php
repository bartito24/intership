<?php
require("conexion.php");
class mdl_requisito
{
    private $id_requisito;
    public $nombrerequisitoplatilla;
    public $obj_con;
    function __construct()
    {
        $this->id_requisito=0;
        $this->nombre="";
        $this->obj_con=new conexion();
    }
    public function set($atributo, $valor)
    {
        $this->$atributo=$valor;

    }

    public function insertar_requisito()
    {
        $sql="insert into requisito_plantilla (nombrerequisitoplatilla,activorequisitoplantilla) value ('$this->nombrerequisitoplatilla',1)";
        $this->obj_con->sin_retorno($sql);
    }
    public function  listar_requisito(){
        $sql="select * from requisito_plantilla";
        return $this->obj_con->con_retorno($sql);
    }
    public function  listar_paso(){
        $sql="select * from paso_plantilla";
        return $this->obj_con->con_retorno($sql);
    }
}