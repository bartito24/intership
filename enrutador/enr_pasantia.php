<?php
require("../controlador/ctrl_pasantia.php");
$obj=new ctrl_pasantia();

if (isset($_POST['registrar'])){
    print_r($_POST);
    $obj->insertar($_POST);
   // echo "<script> window.location.href='../admin/docs/listar_pasantia.php';</script>";
}
elseif (isset($_POST['modificar'])){
    $obj->modificar($_POST);
    echo "<script> window.location.href='../admin/docs/listar_pasantia.php';</script>";
} elseif (isset($_GET['id_carrera'])){
    $obj->eliminar($_GET['id_carrera']);
    echo "<script> window.location.href='../admin/docs/listar_pasantia.php';</script>";
}