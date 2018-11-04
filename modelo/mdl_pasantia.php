<?php
require("conexion.php");
class mdl_pasantia
{
    public $id_empresa;
    public $nombre;
    public $direccion;
    public $telefono;
    public $obj_con;

    function __construct()
    {

        $this->id_empresa = 0;
        $this->nombre = "";
        $this->direccion = "";
        $this->telefono = 0;
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        $sql = "INSERT INTO empresa (nombreempresa,direccionempresa,telefono,activoempresa) VALUE ('$this->nombre','$this->direccion','$this->telefono',1);";
        $this->obj_con->sin_retorno($sql);

    }
    public function modificar()
    {
        $sql="UPDATE empresa SET nombreempresa='$this->nombre', direccionempresa='$this->direccion', telefono='$this->telefono' where id_empresa='$this->id_empresa';";
        $this->obj_con->sin_retorno($sql);

    }

    public function listar()
    {
        $sql = "SELECT * FROM pasantia
  join empleado e on pasantia.empleado_id_empleado = e.id_empleado and pasantia.empleado_persona_id_persona = e.persona_id_persona
  join empleado e2 on pasantia.empleado_id_empleado = e2.id_empleado and pasantia.empleado_persona_id_persona = e2.persona_id_persona
  join persona p on e.persona_id_persona = p.id_persona;";
        return $this->obj_con->con_retorno($sql);
    }
    public function Eliminar($id)
    {
        $sql = "UPDATE empresa SET activoempresa=0 WHERE id_empresa=$id ";
        $this->obj_con->sin_retorno($sql);
    }
}