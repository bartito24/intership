<?php
require("../controlador/ctrl_asignatura.php");
$obj=new ctrl_asignatura();

if (isset($_POST['registrar'])){
    $obj->insertar($_POST);
    echo "<script> window.location.href='../admin/docs/listar_asignatura.php';</script>";
}
elseif (isset($_POST['modificar'])){
    $obj->modificar($_POST);
    echo "<script> window.location.href='../admin/docs/listar_asignatura.php';</script>";
} elseif (isset($_GET['id_asignatura'])){
    $obj->eliminar($_GET['id_asignatura']);
    echo "<script> window.location.href='../admin/docs/listar_asignatura.php';</script>";
}