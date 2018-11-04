<?php
require("../controlador/ctrl_requisito.php");
$obj=new ctrl_requisito();

if (isset($_POST["insertar"])) {
    $obj->insertar_requisito($_POST);
}
