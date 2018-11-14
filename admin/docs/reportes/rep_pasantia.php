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
        $this->SetFont('Arial','I',12 );
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
$pdf->SetFillColor(200,71,71);
$pdf->Cell(0,2,"",0,1,"C",true);
//$pdf->SetFillColor(200,71,71);



$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,10," REPORTE PASANTIAS REGISTRADAS POR EMPRESA EN EL SISTEMA",0,1,"C");

    $pdf->SetX(10);

    $pasantia=$_POST['pasantia'];
    $sql1="SELECT * FROM asignatura WHERE id_asignatura='$pasantia' ";
    $res=$mysqli->query($sql1);
    $dato=mysqli_fetch_assoc($res);
    $nombre=$dato['nombreasignatura']. " ". $dato['nivel'] ;
    $pdf->Ln(8);
    $pdf->Cell(0,10,"ASIGNATURA:  ".$nombre ,0,1,"L");
    $pdf->Ln(5);




//$pdf->SetFillColor(200,71,71);
    $pdf->SetX(10);

    $pdf->Cell(30,10,"Carrera",0,0,"C",true);
    $pdf->SetX(40);

    $pdf->Cell(30,10,"Gestion",0,0,"C", true);
    $pdf->SetX(70);

    $pdf->Cell(30,10,"Empresa",0,0,"C" ,true);
    $pdf->SetX(100);

    $pdf->Cell(30,10,"Area",0,0,"C",true);
    $pdf->SetX(130);

    $pdf->Cell(30,10,"Fecha Inicio",0,0,"C", true);
    $pdf->SetX(160);

    $pdf->Cell(30,10,"Fecha Fin",0,1,"C",true);
    $pdf->SetX(190);

   


$sql="SELECT * FROM pasantia as p, empresa AS e, estudia AS est, carrera AS car WHERE p.empresa_id_empresa= e.id_empresa AND est.carrera_id_carrera= car.id_carrera
AND asignatura_id_asignatura='$pasantia'";

$resultado=$mysqli->query($sql);
$i=1;
while ($row=mysqli_fetch_assoc($resultado)){
    if(($i%2)==0){
        $pdf->SetFillColor(253,221,221);
    }else{
        $pdf->SetFillColor(255,255,255);
    }

    $pdf->SetX(10);
    $carrera=$row['nombrecarrera'];
    $gestion=$row['gestion'];
    $nombreempresa=$row['nombreempresa'];
    $area=$row['area'];
    $fechainicio=$row['fechainicio'];
    $fechafin=$row['fechafin'];
    

    
    $pdf->SetX(10);

    $pdf->Cell(30,10, $carrera, 0,0,"C",true);
    $pdf->SetX(40);

    $pdf->Cell(30,10,$gestion,0,0,"C", true);
    $pdf->SetX(70);

    $pdf->Cell(30,10,$nombreempresa,0,0,"C" ,true);
    $pdf->SetX(100);

    $pdf->Cell(30,10,$area,0,0,"C",true);
    $pdf->SetX(130);

    $pdf->Cell(30,10,$fechainicio,0,0,"C", true);
    $pdf->SetX(160);

    $pdf->Cell(30,10,$fechafin,0,1,"C",true);
    $pdf->SetX(190);

$i++;
}





$pdf->Output();