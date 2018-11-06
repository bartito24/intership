<?php
require("conexion.php");
class mdl_requisitos
{
    private $id_requisitos;
    public $nombrerequisito;
    public $numpasantia;
     public $descripcionre;
    public $obj_con;
    function __construct()
    {
        $this->id_requisitos=0;
        $this->nombrerequisito="";
        $this->numpasantia=0;
        $this->descripcionre="";
        $this->obj_con=new conexion();
    }
    public function set($atributo, $valor)
    {
        $this->$atributo=$valor;

    }

    public function insertar_requisitos()
    {
        $sql="insert into requisitos(nombrerequisito,numpasantia,descripcionre,activorequisito) value ('$this->nombrerequisito','$this->numpasantia','$this->descripcionre',1)";
        $this->obj_con->sin_retorno($sql);
    }
    public function  listar_requisitos(){
        $sql="select * from requisitos";
        return $this->obj_con->con_retorno($sql);
    }
    public function  listar_paso(){
        $sql="select * from requisitos";
        return $this->obj_con->con_retorno($sql);
    }

    public function eliminar()
    {
        $sql="delete from requisitos where id_requisitos='$this->id_requisitos'";
        $this->conec->sin_retorno($sql);

    }
    


    public function listar_dato()
    {
            $sql="select * from requisitos where id_requisitos='$this->id_requisitos' ";
            $resp=$this->conec->con_retorno($sql);
            return $resp;
    }

     public function modificar()
    {
        $sql="UPDATE nota SET nombrerequisito='$this->nombrerequisito',numpasantia='$this->numpasantia', descripcionre='$this->descripcionre' where id_requisitos='$this->id_requisitos';";
        $this->obj_con->sin_retorno($sql);
       ?>
        <script type="text/javascript">
            window.location.href("../admin/docs/listar_requisito.php");

        </script>
     <?php
    }
}