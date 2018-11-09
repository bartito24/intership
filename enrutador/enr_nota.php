<?php
require("../controlador/ctrl_nota.php");
$obj=new ctrl_nota();

if (isset($_POST['registrar'])){
    $obj->insertar($_POST);

}
