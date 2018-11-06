<?php
require("conexion.php");
class mdl_empresa
{
    public $id_empresa;
    public $nombre;
    public $direccion;
    public $telefono;
    public $nombrerep;
    public $apellidorep;
    public $celular;
    public $obj_con;

    function __construct()
    {

        $this->id_empresa = 0;
        $this->nombre = "";
        $this->direccion = "";
        $this->telefono = 0;
        $this->nombrerep = "";
        $this->apellidorep = "";
        $this->celular = 0;
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function insertar()
    {
        $sql = "INSERT INTO empresa (nombreempresa,direccionempresa,telefono,nombrerep,apellidorep,celular,activoempresa) VALUE ('$this->nombre','$this->direccion','$this->telefono','$this->nombrerep','$this->apellidorep','$this->celular',1);";
        $this->obj_con->sin_retorno($sql);

    }
    public function modificar()
    {
        $sql="UPDATE empresa SET nombreempresa='$this->nombre', direccionempresa='$this->direccion', telefono='$this->telefono', nombrerep='$this->nombrerep', apellidorep='$this->apellidorep', celular='$this->celular' where id_empresa='$this->id_empresa';";
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