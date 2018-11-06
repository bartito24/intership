<?php
require("conexion.php");
if (isset($_GET['id_carrera']))
{
    $con= new conexion();
    $sql="update carrera set activocarrera =0 where id_Carrera='$_GET[id_carrera]'";
    $con->sin_retorno($sql);
    echo "<script> window.location.href='../admin/docs/listar_carrera.php';</script>";
}
else {
    class mdl_estudio
    {
        public $id_Carrera;
        public $nombre;
        public $modalidad;
        public $obj_con;

        function __construct()
        {

            $this->id_Carrera = 0;
            $this->nombre = "";
            $this->modalidad = "";
            $this->obj_con = new conexion();
        }

        public function set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        public function insertar()
        {
            $sql = "INSERT INTO carrera (nombrecarrera,modalidad,activocarrera) VALUE ('$this->nombre','$this->modalidad',1);";
            $this->obj_con->sin_retorno($sql);

        }

        public function modificar_carrera()
        {
            $sql = "UPDATE carrera SET nombrecarrera='$this->nombre',modalidad='$this->modalidad' where id_Carrera='$this->id_Carrera';";
            $this->obj_con->sin_retorno($sql);

        }

        public function listar()
        {
            $sql = "SELECT * FROM carrera where activocarrera=1 order by nombrecarrera";
            return $this->obj_con->con_retorno($sql);
        }
    }
}