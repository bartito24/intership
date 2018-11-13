<?php  
require("../controlador/ctrl_visita.php");
$obj=new ctrl_visita();

if (isset($_POST["registrar"])) {
	$obj->insertar($_POST);
	echo "<script> window.location.href='../admin/docs/listar_pasantia.php';</script>";
}
