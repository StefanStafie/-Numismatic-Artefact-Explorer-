<?php 
require('../fpdf/fpdf.php');
require('statistics.php');

function exportstatistics(){ // Most popular coins with information about THE MOST popular coin
    $pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'Most popular coins in DB :',0,1);
$temp=mostpopularcoins();
$pdf->SetFont('Arial','',13);
for($i=0;$i<count($temp);$i++){
    $pdf->Cell(0,10,$temp[$i],0,1);
}
$temp=mostpopularcoin();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,$temp[0],0,1);
$pdf->SetFont('Arial','',13);
for($i=1;$i<count($temp)-2;$i++){
    $pdf->Cell(0,10,$temp[$i],0,1);
}
$pdf->Image($temp[$i],10,130,30);
$pdf->Image($temp[$i+1],50,130,30);
//$pdf->Cell(40,0,$temp[0]);
$pdf->Output();

}
//exportstatistics();

function exportStats(){ // only most popular coins
    $pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'Most popular coins in DB :',0,1);
$temp=mostpopularcoins();
$pdf->SetFont('Arial','',13);
for($i=0;$i<count($temp);$i++){
    $pdf->Cell(0,10,$temp[$i],0,1);
}
$pdf->Output();

}

function  tocsv($userid){
    
    //$out = fopen('php://output', 'w');
    //fputcsv($out, array('this','is some', 'csv "stuff", you know.'));
    //fclose($out);
    /*$conn = OpenCon();
    
        $result = $conn->query('SELECT weight,diameter,axis,identifier,collection FROM coins limit 2000');
        $result2 = $result->fetch_all();
        if (count($result2) <= 0) {
            //databaseToSession($result2);
            echo"not wokring 1";
            return -1;
        }
    */
    $result2=infoaboutyourcoins($userid);
    $delimiter = ",";
        $filename = "Testfrom_" . date('Y-m-d') . ".csv";
        
        //create a file pointer
        $f = fopen('php://memory', 'w');
        
        //set column headers
        $fields = array('weight', 'diameter', 'axis', 'identifier', 'collection');
        fputcsv($f, $fields, $delimiter);
        
        //output each row of the data, format line as csv and write to file pointer
        for ($i=0;$i<count($result2);$i++){
            $lineData = array($result2[$i][0], $result2[$i][1], $result2[$i][2], $result2[$i][3], $result2[$i][4]);
            fputcsv($f, $lineData, $delimiter);
        }
        
        //move back to beginning of file
        fseek($f, 0);
        
        //set headers to download file rather than displayed
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        
        //output all remaining data on a file pointer
        fpassthru($f);
    
    
    }



//exportStats();
tocsv(1);
