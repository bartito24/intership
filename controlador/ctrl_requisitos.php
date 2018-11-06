<?php
require("../modelo/mdl_requisitos.php");
class ctrl_requisitos
{
    public $obj_mod;

    function __construct()
    {
        $this->obj_mod = new mdl_requisitos();
    }

    public function insertar_requisitos($n)
    {
        $this->obj_mod->set("nombrerequisito", $n["nombrerequisito"]);
        $this->obj_mod->set("numpasantia", $n["numpasantia"]);
        $this->obj_mod->set("descripcionre", $n["descripcionre"]);
        $this->obj_mod->insertar_requisitos();

        //echo "<script> window.location.href='../admin/docs/tramites.php';</script>";

    }
    public function listar_requisitos(){
       return $this->obj_mod->listar_requisitos();
    }

    public function listar_dato($dato)
    {
            $this->objeto_modelo->set("id_requisitos",$dato);

            $resp=$this->objeto_modelo->listar_dato();

            return $resp;
    }

     
   public function eliminar($dato)
    {
        $this->objeto_modelo->set("id_requisitos",$dato );
        $this->objeto_modelo->eliminar();
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
?>