<?php
@session_start();
include_once("../../../fpdf/fpdf.php");
include_once("conexion2.php");

class reporte extends FPDF {
    function Header()
    {
        $this->Image('../../../logo/apple-icon.png',10,10,-300);
        $this->SetFont('Arial','B',15);
       // $this->Cell(0,10,"TITULO",0,0,"L");

    }

// Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

}
//$pdf = new reporte();
$pdf = new reporte('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Header();
$pdf->Cell(0,10,"Internship Sistema de Control de Pasantias",0,1,"C");
$pdf->Ln(10);
$pdf->SetFont('Arial','I',2);
$pdf->SetFillColor(200,71,71);
$pdf->Cell(0,2,"hh",0,1,"C",true);
$pdf->SetFillColor(200,71,71);

date_default_timezone_set('America/Boa_Vista');
$fecha= strftime("%Y-%m-%d");

$sql="select * from persona join estudiante e on persona.id_persona = e.persona_id_persona where id_persona=$_SESSION[id_persona]";
$datos=$mysqli->query($sql);
$row=mysqli_fetch_assoc($datos);
$sql="select * from pasantia where activopasantia=1 and estudiante_id_estudiante=$row[id_estudiante]";
$dat=$mysqli->query($sql);
$re=mysqli_fetch_assoc($dat);
$tutor=$re['empleado_id_empleado'];
$sql = "select * from cuadernillo where pasantia_id_pasantia=$re[id_pasantia];";
$cuaderno=$mysqli->query($sql);


$sql1="SELECT * FROM persona AS p, empleado AS e
WHERE p.id_persona=e.persona_id_persona AND e.id_empleado='$tutor'";
$res=$mysqli->query($sql1);
$dato=mysqli_fetch_assoc($res);
$nomtutor=$dato['nombre']." ".$dato['papellido']." ".$dato['sapellido'];

$sql1="select * from pasantia join estudiante e on pasantia.estudiante_id_estudiante = e.id_estudiante join persona p on e.persona_id_persona = p.id_persona
  join empresa e2 on pasantia.empresa_id_empresa = e2.id_empresa join asignatura a on pasantia.asignatura_id_asignatura = a.id_asignatura
  join estudia e3 on e.id_estudiante = e3.estudiante_id_estudiante and e.persona_id_persona = e3.estudiante_persona_id_persona
  join carrera c on e3.carrera_id_carrera = c.id_carrera where persona_id_persona=$_SESSION[id_persona]";
$resp=$mysqli->query($sql1);
$est=mysqli_fetch_assoc($resp);
$nomest=$est['nombre']." ".$est['papellido']." ".$est['sapellido'];

$pdf->SetFont('Arial','I',11);
$pdf->Cell(0,10,"PASANTIAS ASIGNADAS A UN TUTOR ",0,1,"C");

$pdf->Ln(2);
$pdf->Cell(0,10,"TUTOR:  ".strtoupper($nomtutor),0,0,"L");
$pdf->SetX(100);
$pdf->Cell(0,10,"ESTUDIANTE:  ".strtoupper($nomest),0,1,"L");
$pdf->Ln(2);
$pdf->SetFillColor(200,71,71);
$pdf->SetX(10);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(60,10,"Num",0,0,"C",true);
$pdf->SetX(70);
$pdf->Cell(60,10,"Fecha",0,0,"C", true);
$pdf->SetX(130);
$pdf->Cell(60,10,"Descripcion",0,1,"C" ,true);


$sql3="select * from cuadernillo where pasantia_id_pasantia=$re[id_pasantia];";
$resultado=$mysqli->query($sql3);
$i=1;
while ($row4=mysqli_fetch_assoc($resultado)){

    if(($i%2)==0){
        $pdf->SetFillColor(253,221,221);
    }else{
        $pdf->SetFillColor(255,255,255);
    }
    $pdf->SetX(10);
    $fechas=$row4['fecha_registro'];
    $descripcion=$row4['decripcion'];

    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(60,10,$i,0,0,"C",true);
    $pdf->SetX(70);
    $pdf->Cell(60,10,$fecha,0,0,"C", true);
    $pdf->SetX(130);
    $pdf->Cell(60,10,$descripcion,0,1,"C" ,true);
$i++;
}

$pdf->Output();