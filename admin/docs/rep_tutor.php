<?php
include_once ("../../fpdf/fpdf.php");
include_once ("conexion/conexion2.php");

class reporte extends FPDF {
    function Header()
    {
        $this->Image('../../logo/apple-icon.png',10,10,-300);
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
$pdf = new reporte();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Header();
$pdf->Cell(0,10,"Internship Sistema de Control",0,1,"C");
$pdf->Ln(20);
$pdf->SetFont('Arial','I',2);
$pdf->Cell(0,2,"hh",0,1,"C",true);
$tutor=$_POST['tutor'];
$sql1="SELECT * FROM persona AS p, empleado AS e
WHERE p.id_persona=e.persona_id_persona AND e.id_empleado='$tutor' ";
$res=$mysqli->query($sql1);
$dato=mysqli_fetch_assoc($res);
$nomtutor=$dato['nombre']." ".$dato['papellido']." ".$dato['sapellido'];

$pdf->SetFont('Arial','I',11);
$pdf->Cell(0,10,"Pasantias Asignadas por Tutor ".$nomtutor,0,1,"C");
$pdf->Ln(20);
$pdf->SetFillColor(232,232,232);
$pdf->SetX(10);
$pdf->Cell(60,10,"Estudiante",1,0,"C",true);
$pdf->SetX(70);

$pdf->Cell(60,10,"Carrera",1,0,"C", true);
$pdf->SetX(130);
$pdf->Cell(60,10,"Pasantia",1,1,"C" ,true);



$sql="SELECT * FROM estudiante AS e, pasantia AS p, persona AS per, empleado AS emp, asignatura AS a, estudia AS est, carrera AS car
 WHERE p.estudiante_id_estudiante= e.id_estudiante 
 AND e.persona_id_persona=per.id_persona 
 AND emp.id_empleado=p.empleado_id_empleado 
 AND a.id_asignatura=p.asignatura_id_asignatura 
 AND p.estudiante_id_estudiante=e.id_estudiante 
  AND e.id_estudiante= est.estudiante_id_estudiante 
  AND est.carrera_id_carrera= car.id_carrera 
  AND p.empleado_id_empleado=$tutor";
$resultado=$mysqli->query($sql);
$i=1;
while ($row=mysqli_fetch_assoc($resultado)){

    if(($i%2)==0){
        $pdf->SetFillColor(255,0,0);
    }else{
        $pdf->SetFillColor(255,255,255);
    }
    $pdf->SetX(10);
    $nombre=$row['nombre']." ".$row['papellido']." ".$row['sapellido'];
    $pasantia=$row['nombreasignatura']." ".$row['nivel'];
    $carrera=$row['nombrecarrera'];
    $pdf->Cell(60,10,$nombre,1,0,"C",true);
    $pdf->SetX(70);

    $pdf->Cell(60,10,$carrera,1,0,"C", true);
    $pdf->SetX(130);
    $pdf->Cell(60,10,$pasantia,1,1,"C" ,true);
$i++;
}

$pdf->Output();