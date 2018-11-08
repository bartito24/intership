<?php
require("conexion.php");
class mdl_cuadernillo
{
    public $id_cuadernillo;
    public $fecha;
    public $descripcion;
    public $obj_con;

    function __construct()
    {

        $this->id_cuadernillo = 0;
        $this->fecha = 0;
        $this->descripcion= "";
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        date_default_timezone_set('America/Boa_Vista');
        $fecha= strftime("%Y-%m-%d");

        $sql = "INSERT INTO cuadernillo (fecha_registro,fecha,decripcion) VALUE ('$fecha','$this->fecha','$this->descripcion');";
        $this->obj_con->sin_retorno($sql);

        echo $sql;
    }
}