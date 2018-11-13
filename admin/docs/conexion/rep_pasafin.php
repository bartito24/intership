<?php
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
$pdf = new reporte('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Header();
$pdf->Cell(0,10,"Internship Sistema de Control de Pasantias",0,1,"C");
$pdf->Ln(10);
$pdf->SetFont('Arial','I',2);
$pdf->SetFillColor(200,71,71);
$pdf->Cell(0,2,"hh",0,1,"C",true);
$pdf->SetFillColor(200,71,71);

$carrera=$_POST['carrera'];
$asignatura=$_POST['asignatura'];

$sql1="SELECT * FROM carrera where id_carrera=$carrera";
$res=$mysqli->query($sql1);
$dato=mysqli_fetch_assoc($res);
$nomcarrera=$dato['nombrecarrera']." Version ".$dato['version'];

$pdf->SetFont('Arial','I',11);
$pdf->Cell(0,10,"PASANTIAS FINALIZADAS POR CARRERA ",0,1,"C");

$pdf->Ln(2);
$pdf->Cell(0,10,"CARRERA:  ".strtoupper($nomcarrera),0,1,"L");
$pdf->Ln(2);
$pdf->SetFillColor(200,71,71);
$pdf->SetX(10);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(60,10,"Estudiante",0,0,"C",true);
$pdf->SetX(70);
$pdf->Cell(60,10,"Estado",0,0,"C", true);
$pdf->SetX(130);
$pdf->Cell(60,10,"Regimen",0,0,"C" ,true);
$pdf->SetX(180);
$pdf->Cell(60,10,"Empresa",0,0,"C" ,true);
$pdf->SetX(220);
$pdf->Cell(60,10,"Nota Final",0,1,"C" ,true);



$sql="select * from pasantia join estudiante e on pasantia.estudiante_id_estudiante = e.id_estudiante join persona p on e.persona_id_persona = p.id_persona
  join empresa e2 on pasantia.empresa_id_empresa = e2.id_empresa join asignatura a on pasantia.asignatura_id_asignatura = a.id_asignatura
  join estudia e3 on e.id_estudiante = e3.estudiante_id_estudiante and e.persona_id_persona = e3.estudiante_persona_id_persona
  join carrera c on e3.carrera_id_carrera = c.id_carrera where carrera_id_carrera=$carrera and asignatura_id_asignatura=$asignatura and estadopasantia=3";
$resultado=$mysqli->query($sql);
$i=1;
while ($row=mysqli_fetch_assoc($resultado)){

    if(($i%2)==0){
        $pdf->SetFillColor(253,221,221);
    }else{
        $pdf->SetFillColor(255,255,255);
    }
    $pdf->SetX(10);
    $nombre=$row['nombre']." ".$row['papellido']." ".$row['sapellido'];
    $nota=$row['notafinal'];
    $regimen=$row['modalidad'];
    $estado=$row['observacionp'];
    $empresa=$row['nombreempresa'];

    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(60,10,$nombre,0,0,"C",true);
    $pdf->SetX(70);
    $pdf->Cell(60,10,$estado,0,0,"C", true);
    $pdf->SetX(130);
    $pdf->Cell(60,10,$regimen,0,0,"C" ,true);
    $pdf->SetX(180);
    $pdf->Cell(60,10,$empresa,0,0,"C" ,true);
    $pdf->SetX(220);
    $pdf->Cell(60,10,$nota,0,1,"C" ,true);
$i++;
}

$pdf->Output();