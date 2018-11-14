<?php
require("conexion.php");
class mdl_visita
{
    private $id_visita;
    private $id_pasantia;
    public $fecha;
    public $observaciones;
    public $latitud;
    public $longitud;
    public $id_estudiante;
    public $obj_con;

    function __construct()
    {
        $this->id_visita = 0;
        $this->id_estudiante = 0;
        $this->id_pasantia = 0;
        $this->fecha = "";
        $this->observaciones = "";
        $this->latitud = 0;
        $this->longitud = 0;
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        $sql = "UPDATE pasantia
SET fechavisita = '$this->fecha', observacionvisita = '$this->observaciones', latitud= $this->latitud, longitud=$this->longitud, estadopasantia=2
where estudiante_id_estudiante = $this->id_estudiante;";
        $this->obj_con->sin_retorno($sql);
    }

     public function listar()
    {
        $sql = "SELECT * FROM visita ORDER BY id_visita ;";
        return $this->obj_con->con_retorno($sql);
    }
    public function modificar()
    {
        $sql="UPDATE pasantia SET latitud='$this->latitud', longitud='$this->longitud', observacionvisita='$this->observaciones' where id_pasantia=$this->id_pasantia;";
        //print_r($sql);
        $this->obj_con->sin_retorno($sql);

    }

    public function eliminar($id)
    {
        $condicion="";
        $sql = "UPDATE pasantia SET latitud=(NULL), longitud=(NULL),observacionvisita=(NULL), estadopasantia=1 WHERE id_pasantia=$id";
        print_r($sql);
        $this->obj_con->sin_retorno($sql);
    }
}
?>
