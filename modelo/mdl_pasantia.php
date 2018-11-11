<?php
require("conexion.php");
class mdl_pasantia
{
    private $id_pasantia;
    public $fechainicio;
    public $fecha;
    public $gestion;
    public $docs;
    public $estadopasantia;
    public $empleado;
    public $empresa;
    public $asignatura;
    public $area;
    public $funciones;
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
        $this->fecha = "";
        $this->gestion = "";
        $this->docs = "";
        $this->estadopasantia = 0;
        $this->empleado = 0;
        $this->empresa = 0;
        $this->asignatura = 0;
        $this->area = "";
        $this->funciones = "";
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
        date_default_timezone_set('America/Boa_Vista');
        $fecha= strftime("%Y-%m-%d");
        $hora= strftime("%H:%M:%S");

        $sql = "INSERT INTO pasantia (empresa_id_empresa,area,funciones,asignatura_id_asignatura,estudiante_id_estudiante,fechainicio,empleado_id_empleado,gestion,estadopasantia, activopasantia)
        VALUE ($this->empresa,'$this->area','$this->funciones',$this->asignatura,$this->estudiante,'$fecha',$this->empleado,$this->gestion,1,1)";
        $this->obj_con->sin_retorno($sql);
        $sql2 = "update estudiante set enpasantia=1";
        $this->obj_con->sin_retorno($sql2);
    }
    public function modificar()
    {
        $sql="UPDATE empresa SET nombreempresa='$this->nombre', direccionempresa='$this->direccion', telefono='$this->telefono' where id_empresa='$this->id_empresa';";
        $this->obj_con->sin_retorno($sql);
    }

    public function listar()
    {
        $sql = "SELECT * FROM pasantia join estudiante e on pasantia.estudiante_id_estudiante = e.id_estudiante join persona p on e.persona_id_persona = p.id_persona 
        join asignatura a on pasantia.asignatura_id_asignatura = a.id_asignatura join estudia e2 on e.id_estudiante = e2.estudiante_id_estudiante and e.persona_id_persona = e2.estudiante_persona_id_persona 
        join carrera c on e2.carrera_id_carrera = c.id_carrera where activopasantia=1";
        return $this->obj_con->con_retorno($sql);
    }
    public function Eliminar($id)
    {
        $sql = "UPDATE empresa SET activoempresa=0 WHERE id_empresa=$id ";
        $this->obj_con->sin_retorno($sql);
    }
}