<?php  
require("../controlador/ctrl_cursoexterno.php");
$obj=new ctrlcurso();

if (isset($_POST["asignar"])) {
	$obj->insertar($_POST);
	echo "<script> window.location.href='../admin/docs/listar_cursoexterno.php';</script>";
}

?>