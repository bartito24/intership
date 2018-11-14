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
$pdf->Cell(0,10,"Internship Sistema de Seguimiento De Pasantia",0,1,"C");
$pdf->Ln(20);
$pdf->SetFont('Arial','I',2);
$pdf->SetFillColor(200,71,71);
$pdf->Cell(0,2,"hh",0,1,"C",true);
$pdf->SetFillColor(200,71,71);
$condicion=$_POST['condicion'];
$sql1="SELECT * FROM pasantia WHERE  observacionp='$condicion'";
$res=$mysqli->query($sql1);
$dato=mysqli_fetch_assoc($res);
$estado=$dato['observacionp'];

$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,10,"CONDICION DEl ESTUDIANTE EN LA PASANTIA ",0,1,"C");

$pdf->Ln(8);
$pdf->Cell(0,10,"CONDICION DEL ESTUDIANTE:  ".strtoupper($estado),0,1,"L");
$pdf->Ln(5);
$pdf->SetFillColor(200,71,71);
$pdf->SetX(10);

$pdf->Cell(50,10,"Estudiante",0,0,"C",true);
$pdf->SetX(60);

$pdf->Cell(50,10,"Carrera",0,0,"C", true);
$pdf->SetX(110);

$pdf->Cell(30,10,"Pasantia",0,0,"C" ,true);
$pdf->SetX(140);

$pdf->Cell(50,10,"Tutor",0,1,"C" ,true);
$pdf->SetX(190);



$sql="SELECT * FROM estudiante AS e, pasantia AS p, persona AS per, asignatura AS a, estudia AS est, carrera AS car
 WHERE p.estudiante_id_estudiante= e.id_estudiante 
AND e.id_estudiante=est.estudiante_id_estudiante
AND est.carrera_id_carrera= car.id_carrera
 AND e.persona_id_persona=per.id_persona 
 AND a.id_asignatura=p.asignatura_id_asignatura 
  AND p.observacionp='$condicion'";

$resultado=$mysqli->query($sql);
$i=1;
while ($row=mysqli_fetch_assoc($resultado)){

    if(($i%2)==0){
        $pdf->SetFillColor(253,221,221);
    }else{
        $pdf->SetFillColor(255,255,255);
    }

    $pdf->SetX(10);
    $id_estudiante=$row['id_estudiante'];
    $nombre=$row['nombre']." ".$row['papellido']." ".$row['sapellido'];
    $pasantia=$row['nombreasignatura']." ".$row['nivel'];
    $carrera=$row['nombrecarrera'];
    $sql2="SELECT nombre AS nomt,papellido AS ap,sapellido AS am FROM pasantia AS pa, persona AS pe, empleado AS em,estudiante AS es
WHERE pa.estudiante_id_estudiante=es.id_estudiante
AND pa.empleado_id_empleado=em.id_empleado
AND pe.id_persona=em.id_empleado
AND pa.observacionp='$condicion'
AND pa.estudiante_id_estudiante='$id_estudiante'";
$res2=$mysqli->query($sql2);
$dato2=mysqli_fetch_assoc($res2);
    $nomtutor=$dato2['nomt']." ".$dato2['ap']." ".$dato2['am'];


    $pdf->Cell(50,10,$nombre,0,0,"C",true);
    $pdf->SetX(60);

    $pdf->Cell(50,10,$carrera,0,0,"C", true);
    $pdf->SetX(110);
    $pdf->Cell(30,10,$pasantia,0,0,"C" ,true);
    $pdf->SetX(140);
    $pdf->Cell(50,10,$nomtutor,0,1,"C" ,true);
    $pdf->SetX(190);

$i++;
}

$pdf->Output();