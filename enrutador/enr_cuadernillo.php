<?php
require("../controlador/ctrl_cuadernillo.php");
$obj=new ctrl_cuadernillo();

if (isset($_POST['registrar'])){
    $obj->insertar($_POST);
    echo "<script> window.location.href='../admin/docs/llenar_cuadernillo.php';</script>";
}elseif (isset($_POST['generar'])){
    echo "<script> window.location.href='../admin/docs/conexion/generar_cuaderno.php';</script>";
}