<?php
require("../controlador/ctrl_inicio_tramite.php");
$obj=new ctrl_inicio_tramite();
if (isset($_POST['subirtramite'])){
    $obj->insertar($_POST);
}