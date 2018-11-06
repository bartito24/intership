<?php
require("conexion.php");
class mdl_pasantia
{
    private $id_pasantia;
    public $fechainicio;
    public $fechafin;
    public $gestion;
    public $docs;
    public $estadopasantia;
    public $id_empleado;
    public $empresa;
    public $asignatura;
    public $area;
    public $descripcion;
    public $estudiante;
    public $fechavisita;
    public $observacionvisita;
    public $latitud;
    public $longitud;
    public $notasupervisor;
    public $notatutor;
    public $notafinal;
    public $observacionp;
    public $obj_con;

    function __construct()
    {
        $this->id_pasantia = 0;
        $this->fechainicio = "";
        $this->fechafin = "";
        $this->gestion = "";
        $this->docs = "";
        $this->estadopasantia = 0;
        $this->id_empleado = 0;
        $this->empresa = 0;
        $this->asignatura = 0;
        $this->area = "";
        $this->descripcion = "";
        $this->estudiante = 0;
        $this->fechavisita = "";
        $this->observacionvisita = "";
        $this->latitud = 0;
        $this->longitud = 0;
        $this->notasupervisor = 0;
        $this->notatutor = 0;
        $this->notafinal = 0;
        $this->observacionp = "";
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        $sql = "INSERT INTO pasantia (fechainicio,fechafin,gestion,docs,estadopasantia, empleado_id_empleado, empresa_id_empresa, asignatura_id_asignatura, area, funciones, estudiante_id_estudiante, fechavisita, observacionvisita,latitud, longitud, notasupervisor, notatutor, notafinal, observacionp, activopasantia) VALUE ('$this->fechainicio',(NULL),'$this->gestion','',1,1,'$this->empresa','$this->asignatura','$this->area','$this->descripcion','$this->estudiante',(NULL),'','0','0','0','0','0','',1)";
        $this->obj_con->sin_retorno($sql);

    }
    public function modificar()
    {
        $sql="UPDATE empresa SET nombreempresa='$this->nombre', direccionempresa='$this->direccion', telefono='$this->telefono' where id_empresa='$this->id_empresa';";
        $this->obj_con->sin_retorno($sql);

    }

    public function listar()
    {
        $sql = "SELECT * FROM pasantia where activopasantia=1";
        return $this->obj_con->con_retorno($sql);
    }
    public function Eliminar($id)
    {
        $sql = "UPDATE empresa SET activoempresa=0 WHERE id_empresa=$id ";
        $this->obj_con->sin_retorno($sql);
    }
}