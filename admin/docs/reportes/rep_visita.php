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
$pdf->SetFont('Arial','I',11);
$pdf->Cell(0,10,"REPORTE DE VISITA POR ESTUDIANTE",0,1,"C");
$pdf->SetFillColor(200,71,71);
$pdf->Cell(0,2,"",0,1,"C",true);
$pdf->SetFillColor(200,71,71);

$pdf->SetFont('Arial','I',8);

$estudiante=$_POST['estudiante'];
$sql1="SELECT * FROM persona
WHERE id_persona='$estudiante' ";
$res=$mysqli->query($sql1);
$dato=mysqli_fetch_assoc($res);
$estudiante1=$dato['nombre']." ".$dato['papellido']." ".$dato['sapellido'];

$pdf->Ln(8);
$pdf->Cell(0,10,"ESTUDIANTE:  ". utf8_decode($estudiante1),0,1,"L");
$pdf->Ln(5);

$pdf->SetFillColor(200,71,71);
$pdf->SetX(10);

    $pdf->Cell(30,10,"CARRERA",0,0,"C",true);
    $pdf->SetX(40);

    $pdf->Cell(25,10,"EMPRESA",0,0,"C", true);
    $pdf->SetX(65);

    $pdf->Cell(25,10,"AREA",0,0,"C" ,true);
    $pdf->SetX(90);

    $pdf->Cell(20,10,"FEC. VISITA",0,0,"C",true);
    $pdf->SetX(110);

    $pdf->Cell(20,10,"FEC. INICIO",0,0,"C", true);
    $pdf->SetX(130);

    $pdf->Cell(20,10,"FEC. FIN",0,0,"C",true);
    $pdf->SetX(150);

    $pdf->Cell(45,10,"OBSERVACIONES",0,1,"C",true);
    $pdf->SetX(195);


$sql="SELECT * FROM estudiante AS e, pasantia AS p, persona AS per, estudia AS est, carrera AS car, empresa AS em
 WHERE p.estudiante_id_estudiante= e.id_estudiante 
 AND e.persona_id_persona=per.id_persona
 AND p.estudiante_id_estudiante=e.id_estudiante 
 AND e.id_estudiante= est.estudiante_id_estudiante 
 AND est.carrera_id_carrera= car.id_carrera 
 AND em.id_empresa= p.empresa_id_empresa
 AND per.id_persona=$estudiante";

$resultado=$mysqli->query($sql);
$i=1;
while ($row=mysqli_fetch_assoc($resultado)){

    if(($i%2)==0){
        $pdf->SetFillColor(253,221,221);
    }else{
        $pdf->SetFillColor(255,255,255);
    }
    $pdf->SetX(10);
    $fechainicio=$row['fechainicio'];
    $fechafin=$row['fechafin'];
    $fechavisita=$row['fechavisita'];
    $observacionvisita=$row['observacionvisita'];
    $area=$row['area'];
    $nombreempresa=$row['nombreempresa'];
    $nombrecarrera=$row['nombrecarrera'];

    $pdf->Cell(30,10,$nombrecarrera,0,0,"C",true);
    $pdf->SetX(40);

    $pdf->Cell(25,10,$nombreempresa,0,0,"C", true);
    $pdf->SetX(65);

    $pdf->Cell(25,10,$area,0,0,"C" ,true);
    $pdf->SetX(90);

    $pdf->Cell(20,10,$fechavisita,0,0,"C",true);
    $pdf->SetX(110);

    $pdf->Cell(20,10,$fechainicio,0,0,"C", true);
    $pdf->SetX(130);

    $pdf->Cell(20,10,$fechafin,0,0,"C",true);
    $pdf->SetX(150);

    $pdf->Cell(45,10,$observacionvisita,0,1,"C",true);
    $pdf->SetX(195);


$i++;
}

$pdf->Output();