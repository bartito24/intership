<?php
require("../controlador/ctrl_agregarusuario.php");
$obj=new ctrlUsuario();

if (isset($_POST["registrar"])) {
	$obj->insertar_persona($_POST);
}
elseif (isset($_POST["modificar"])) {

	$obj->modificar($_POST);
    echo "<script> window.location.href='../admin/docs/table-personas.php';</script>";
}
elseif (isset($_POST["asignar"])) {

    $obj->asignar($_POST);
}
?>