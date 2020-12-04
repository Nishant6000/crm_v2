<?php 
require('xlsxreader.php');
require('xlsxwriter.php');

$xlsx = new XLSXReader('1.xlsx'); // Use Session to Get file name
$sheetNames = $xlsx->getSheetNames();
$namest = false;
	//$sheetNames = $xlsx->getSheetNames();
	$sheet = $xlsx->getSheet($sheetNames[1]);
	$final = $sheet->getData();
	echo $rowcounter =  count($final);
	$rowcount = $final[0];
	print_r($rowcount);

?>