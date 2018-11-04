<?php
require("conexion.php");
class mdl_empresa
{
    public $id_empresa;
    public $nombre;
    public $direccion;
    public $telefono;
    public $area;
    public $funciones;
    public $nombresupervisor;
    public $celsupervisor;
    public $correosupervisor;
    public $obj_con;

    function __construct()
    {

        $this->id_empresa = 0;
        $this->nombre = "";
        $this->direccion = "";
        $this->telefono = 0;
        $this->area = "";
        $this->funciones = "";
        $this->nombresupervisor = "";
        $this->celsupervisor = 0;
        $this->correosupervisor = "";
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        $sql = "INSERT INTO empresa (nombreempresa,direccionempresa,telefono,area,funciones,nombresupervisor,celsupervisor,correosupervisor,activoempresa) VALUE ('$this->nombre','$this->direccion','$this->telefono','$this->area','$this->funciones','$this->nombresupervisor','$this->celsupervisor','$this->correosupervisor',1);";
        $this->obj_con->sin_retorno($sql);

    }
    public function modificar()
    {
        $sql="UPDATE empresa SET nombreempresa='$this->nombre', direccionempresa='$this->direccion', telefono='$this->telefono', area='$this->area', funciones='$this->funciones', nombresupervisor='$this->nombresupervisor', celsupervisor='$this->celsupervisor', correosupervisor='$this->correosupervisor' where id_empresa='$this->id_empresa';";
        $this->obj_con->sin_retorno($sql);

    }

    public function listar()
    {
        $sql = "SELECT * FROM empresa where activoempresa=1 ORDER BY id_empresa;";
        return $this->obj_con->con_retorno($sql);
    }
    public function Eliminar($id)
    {
        $sql = "UPDATE empresa SET activoempresa=0 WHERE id_empresa=$id ";
        $this->obj_con->sin_retorno($sql);
    }
}