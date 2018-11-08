<?php
require("../controlador/ctrl_documentacion.php");
$obj=new ctrl_documentacion();

if (isset($_POST['registrar'])){
    $obj->insertar($_POST);
    echo "<script> window.location.href='../admin/docs/listar_documentacion.php';</script>";
}
elseif (isset($_POST['modificar'])){
    $obj->modificar($_POST);
    echo "<script> window.location.href='../admin/docs/listar_documentacion.php';</script>";
}
elseif (isset($_GET['id_documentacion'])){
    $obj->eliminar($_GET['id_documentacion']);
    echo "<script> window.location.href='../admin/docs/listar_documentacion.php';</script>";
}