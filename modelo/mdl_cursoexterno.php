<?php
require("conexion.php");
class mdl_curso
{
    public $id_Curso;
    public $nombre;
    public $obj_con;

    function __construct()
    {

        $this->id_Curso = 0;
        $this->nombre = "";
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        $sql = "INSERT INTO curso (nombrecurso,activocurso) VALUE ('$this->nombre',1);";
        $this->obj_con->sin_retorno($sql);

    }

     public function listar()
    {
        $sql = "SELECT * FROM curso ORDER BY id_Curso ;";
        return $this->obj_con->con_retorno($sql);
    }
}
?>
