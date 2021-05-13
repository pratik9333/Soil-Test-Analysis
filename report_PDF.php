<?php
    ob_start();
    session_start();
      if(!isset($_SESSION['Name']))
        header('location:http://localhost/Soil Test Analysis/farmer.php');
     require './FPDF/fpdf.php';
     
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);
        $pdf->setTextColor(252, 3, 3);
        $pdf->Cell(200,20,'Soil Test Analysis',0,1,'C');
        $pdf->setLeftMargin(10);
        $pdf->setTextColor(0, 0, 0);

        // table column
        $pdf->Cell(15,10,'Test ID',1,0,'C');
        $pdf->Cell(15,10,'PH',1,0,'C');
        $pdf->Cell(15,10,'Nitrogen',1,0,'C');
        $pdf->Cell(17,10,'Phosphorus',1,0,'C');
        $pdf->Cell(15,10,'Pottasium',1,0,'C');
        $pdf->Cell(15,10,'Calcium',1,0,'C');
        $pdf->Cell(17,10,'Magnesium',1,0,'C');
        $pdf->Cell(15,10,'Salinity',1,0,'C');
        $pdf->Cell(15,10,'Zinc',1,0,'C');
        $pdf->Cell(15,10,'Iron',1,0,'C');
        $pdf->Cell(16,10,'Manganese',1,0,'C');
        $pdf->Cell(15,10,'Copper',1,0,'C');
        $pdf->Cell(15,10,'Sodium',1,1,'C');
        // table rows
        $pdf->SetFont('Arial','',8);
        $con=mysqli_connect("localhost","root","");
        mysqli_select_db($con,"soil_test_analysis");
        $test=$_POST['id'];
        $query ="SELECT * FROM reports where TestID=$test";
        $result=mysqli_query($con,$query);
        $num=mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        for($i=1;$i<=$num;$i++)
        {
              $pdf->Cell(15,10,$row['TestID'],1,0,'C');
              $pdf->Cell(15,10,$row['PH'],1,0,'C');
              $pdf->Cell(15,10,$row['Nitrogen'],1,0,'C');
              $pdf->Cell(17,10,$row['Phosphorus'],1,0,'C');
              $pdf->Cell(15,10,$row['Pottasium'],1,0,'C');
              $pdf->Cell(15,10,$row['Calcium'],1,0,'C');
              $pdf->Cell(17,10,$row['Magnesium'],1,0,'C');
              $pdf->Cell(15,10,$row['Salinity'],1,0,'C');
              $pdf->Cell(15,10,$row['Zinc'],1,0,'C');
              $pdf->Cell(15,10,$row['Iron'],1,0,'C');
              $pdf->Cell(16,10,$row['Manganese'],1,0,'C');
              $pdf->Cell(15,10,$row['Copper'],1,0,'C');
              $pdf->Cell(15,10,$row['Sodium'],1,0,'C');
        }

        $pdf->Output();
?>