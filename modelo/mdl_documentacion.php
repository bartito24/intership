<?php
require("conexion.php");
class mdl_documentacion
{
    public $id_documentacion;
    public $nombredoc;
    public $fechaentrega;
    public $respaldo;
    public $id_estudiante;
    public $obj_con;

    function __construct()
    {

        $this->id_documentacion = 0;
        $this->id_estudiante = 0;
        $this->nombredoc = "";
        $this->fechaentrega = "";
        $this->respaldo = "";
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        $sql = "INSERT INTO documentacion (nombredoc,fechaentrega,respaldo) VALUE ('$this->nombredoc','$this->fechaentrega','$this->respaldo');";
        $this->obj_con->sin_retorno($sql);

    }
    public function modificar()
    {
        $sql="UPDATE documentacion SET nombredoc='$this->nombredoc', respaldo='$this->respaldo' where id_documentacion='$this->id_documentacion';";
        $this->obj_con->sin_retorno($sql);

    }

    public function listar()
    {
        $sql = "SELECT * FROM documentacion ORDER BY id_documentacion;";
        return $this->obj_con->con_retorno($sql);
    }
    public function Eliminar($id)
    {
        $sql = "UPDATE documentacion  WHERE id_documentacion=$id";
        $this->obj_con->sin_retorno($sql);
    }
}