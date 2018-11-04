<?php
require("conexion.php");

class mdl_tramite
{
    public $condicion;
    public $Tramite_plantilla_idTramite_plantilla;
    public $estudiante_id_estudiante;
    public $estudiante_persona_id_persona;

    function __construct()
    {
        $this->condicion="";
        $this->Tramite_plantilla_idTramite_plantilla=0;
        $this->estudiante_id_estudiante=0;
        $this->estudiante_persona_id_persona=0;
        $this->conec=new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo=$valor;
    }
    public function insertar()
    {
        $sql1="select * from persona join estudiante e on persona.id_persona = e.persona_id_persona
        where id_estudiante = $this->estudiante_id_estudiante";
        $datos=$this->conec->con_retorno($sql1);
        $row=mysqli_fetch_assoc($datos);
        $this->estudiante_persona_id_persona=$row['id_persona'];
        echo $this->Tramite_plantilla_idTramite_plantilla;
        echo $this->estudiante_id_estudiante;
        echo $this->estudiante_persona_id_persona;
        $sql="insert into tramite(condicion,Tramite_plantilla_idTramite_plantilla,estudiante_id_estudiante,estudiante_persona_id_persona,activotramiteiniciado) values ('fin',$this->Tramite_plantilla_idTramite_plantilla,$this->estudiante_id_estudiante,$this->estudiante_persona_id_persona,1)";
        $this->conec->sin_retorno($sql);
    }
    public function listar_estudiante(){
        $sql="select * from estudiante join persona p on estudiante.persona_id_persona = p.id_persona
              where p.activo=1";
       return $this->conec->con_retorno($sql);
    }
    public function listar_tramite () {
        $sql="select * from tramite_plantilla where activotramite=1";
        return $this->conec->con_retorno($sql);
    }
}