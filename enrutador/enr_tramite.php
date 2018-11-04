<?php
require ('../modelo/conexion.php');
$con=new conexion();
$valorreq=$_POST['req'];
$valorpas=$_POST['pas'];
$valornombre=$_POST['nombre'];
$sql="insert into tramite_plantilla (nombretramite, activotramite) values ('$valornombre',1)";
$con->sin_retorno($sql);
$sql="select * from tramite_plantilla where nombretramite='$valornombre'";
$datostramite=$con->con_retorno($sql);
$v=mysqli_fetch_assoc($datostramite);
echo "$v[idTramite_plantilla]";
for ($i=0;$i<count($valorreq);$i++){
    $sql="select * from requisito_plantilla where nombrerequisitoplatilla='$valorreq[$i]';";
    $datosrequisito=$con->con_retorno($sql);
    $r=mysqli_fetch_assoc($datosrequisito);
    $sql="insert into necesita (Tramite_plantilla_idTramite_plantilla,Requisito_plantilla_id_Requisitoplantilla)
      values ('$v[idTramite_plantilla]','$r[id_Requisitoplantilla]')";
    $con->sin_retorno($sql);
}

for ($j=0;$j<count($valorpas);$j++){
    $sql="select * from paso_plantilla where nombrepasoplantilla='$valorpas[$j]';";
    $datospaso=$con->con_retorno($sql);
    $p=mysqli_fetch_assoc($datospaso);
    $sql="insert into procede (tramite_plantilla_idTramite_plantilla,paso_plantilla_id_Pasoplantilla)
      values ('$v[idTramite_plantilla]','$p[id_Pasoplantilla]')";
    $con->sin_retorno($sql);
}
header("Location:" .getenv("HTTP_REFERER"));
exit;
