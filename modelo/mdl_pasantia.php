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
    public $id_persona;
    public $id_empresa;
    public $id_asignatura;
    public $area;
    public $funciones;
    public $id_estudiante;
    public $id_estudiante_persona;
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
        $this->id_persona = 0;
        $this->id_empresa = 0;
        $this->id_asignatura = 0;
        $this->area = "";
        $this->funciones = "";
        $this->id_estudiante = 0;
        $this->id_estudiante_persona = 0;
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
        $sql = "INSERT INTO pasantia (fechainicio,fechafin,gestion,docs,estadopasantia, empleado_id_empleado, empleado_persona_id_persona, empresa_id_empresa, asignatura_id_asignatura, area, funciones, estudiante_id_estudiante, estudiante_persona_id_persona, fechavisita, observacionvisita,latitud, longitud, notasupervisor, notatutor, notafinal, observacionp, activopasantia) VALUE ('$this->fechainicio','$this->fechafin','$this->gestion','$this->docs',1,'$this->id_empleado','$this->id_persona','$this->id_empresa','$this->id_asignatura','$this->area','$this->funciones','$this->id_estudiante','$this->id_estudiante_persona','$this->fechavisita','$this->observacionvisita','$this->latitud','$this->longitud','$this->notasupervisor','$this->notatutor','$this->notafinal','$this->observacionp',1);";
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