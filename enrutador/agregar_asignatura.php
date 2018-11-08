<?php
@session_start();
require ('../modelo/conexion.php');
$con=new conexion();
$valorreq=$_POST['req'];
$valornombre=$_POST['nombreasignatura'];
$nivel=$_POST['nivel'];
$descripcion=$_POST['descripcionasig'];
$sql="select * from asignatura where nombreasignatura = '$valornombre' and nivel = $nivel";
$asignatura=$con->con_retorno($sql);
$rowasignatura=mysqli_fetch_assoc($asignatura);
if($rowasignatura['nombreasignatura']=="$valornombre && $rowasignatura[nivel]== $nivel "){
    $sql2 = "update asignatura set activoasignatura =1 where id_asignatura= $asignatura[id_asignatura]";
    $re=$con->con_retorno($sql2);
    if ($re == " ") {
        $_SESSION['error'] = "exitoso";
    } else {
        $_SESSION['error'] = "falla";
    }
    header("Location:" .getenv("HTTP_REFERER"));
} else{

    $sql="insert into asignatura (nombreasignatura, nivel, descripcionasig, activoasignatura) values ('$valornombre',$nivel,'$descripcion',1)";
    $con->sin_retorno($sql);
    $sql="select * from asignatura where nombreasignatura='$valornombre' and nivel = $nivel";
    $requi=$con->con_retorno($sql);
    $v=mysqli_fetch_assoc($requi);
   echo $valorreq[0];
    for ($i=0;$i<count($valorreq);$i++){
        $sql="select * from requisitos where nombrerequsito = '$valorreq[$i]' ";
        $dar=$con->con_retorno($sql);
        $da=mysqli_fetch_assoc($dar);
        echo $da['id_requisitos'];
      $sql="insert into tiene (requisitos_id_requisitos, asignatura_id_asignatura) VALUES ($da[id_requisitos],$v[id_asignatura])";
       $con->sin_retorno($sql);
    }
    $_SESSION['error'] = "exitoso";
    header("Location:" .getenv("HTTP_REFERER"));
    exit;
}
