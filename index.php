<?php
/**
 * User: Laurie Ghione
 * Date: 07/11/16
 * Time: 12:32
 */

require_once('FPDF/fpdf.php');
require_once('FPDI/fpdi.php');
require_once('function.php');

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
$today = new DateTime();

/* calculation nb months in society */
$dateEntrance = stringToDate('2015-03-01');
$interval = dateDiff($today,$dateEntrance);
$nbMonthsInSociety =  (12 * $interval->format('%y') + $interval->format('%m'));

/* calculation my age */
$dateOfBirth = stringToDate('1991-08-05');
$interval = dateDiff($today,$dateOfBirth);
$age = $interval->format('%y');

/* generate pdf with new data */
$pdf = new FPDI();

/* add my pdf file*/
$pageCount = $pdf->setSourceFile('CVLaurieGhione.pdf');
$tplIdx = $pdf->importPage(1);

$pdf->addPage();
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddFont('MyriadPro-Regular','','MyriadPro-Regular.php');
$pdf->SetFont('MyriadPro-Regular','',9);

/* display num months in society */
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(151.4, 74.2);
$pdf->Write(0, $nbMonthsInSociety);

/* display my age */
$pdf->SetTextColor(255, 255, 255);
$pdf->SetXY(187, 37.5);
$pdf->Write(0, $age);

/* Pdf download */
$pdf->Output('D','CVLaurieGhione.pdf');
?>