<?php
require("../controlador/ctrl_requisito.php");
$obj=new ctrl_requisito();

if (isset($_POST["insertar"])) {
    $obj->insertar_requisito($_POST);
}
elseif (isset($_GET['id_requisitos'])){
    $obj->eliminar($_GET['id_requisitos']);
    echo "<script> window.location.href='../admin/docs/listar_requisito.php';</script>";
}

elseif (isset($_POST['modificar'])){
    $obj->modificar($_POST);
    echo "<script> window.location.href='../admin/docs/listar_requisito.php';</script>";
print_r($obj);
}

