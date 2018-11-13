<?php
@session_start();
include_once ('../../modelo/conexion.php');
$ob=new conexion();
$sql="select * from pasantia join estudiante e on pasantia.estudiante_id_estudiante = e.id_estudiante join persona p on e.persona_id_persona = p.id_persona
where id_persona=$_SESSION[id_persona]";
$fre=$ob->con_retorno($sql);
$datos=mysqli_fetch_assoc($fre);
$query = "SELECT * FROM cuadernillo where pasantia_id_pasantia='$datos[id_pasantia]'";
$dat=$ob->con_retorno($query);
$event = array();

while($row=mysqli_fetch_assoc($dat)){

    $e = array();

    $e['title'] = "Dia Llenado";
    $e['start'] = $row['fecha_registro'];
    array_push($event, $e);
}

echo json_encode($event);
exit();