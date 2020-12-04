<?php
date_default_timezone_set('UTC');
require('../classes/xlsxreader.php');
require('../classes/class.customsearch.php');
require('../classes/xlsxwriter.php');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
$location = "../database/";
$filename = "306.xlsx"; // Based on session make file
$main_file_name = $location."response".$filename;
$main_file_name_2 = $location.$filename;
if(!file_exists($main_file_name_2)){
	echo "File Does not Exists";
	die;
}
$xlsx = new XLSXReader($location.$filename); // Use Session to Get file name
$sheetNames = $xlsx->getSheetNames();
$namest = false;
$urlcnt = 0;
$urlfcount = 0;
$filenametocreatexlsxdata = $location."response".$filename;
$forxlsxdata = array();
$writer = new XLSXWriter();
$writer->setAuthor('Optin Prospects'); 
$kmc = 0;
if(count($sheetNames) == 0 || count($sheetNames) == ""){
	echo "Empty File Cannot Proceed";
}else{
	//$sheetNames = $xlsx->getSheetNames();
	$sheet = $xlsx->getSheet($sheetNames[1]);
	$final = $sheet->getData();
	echo $rowcounter =  count($final);
	$rowcount = $final[0];
	foreach($rowcount as $rowcnt){
		if(stristr($rowcnt, 'url')){
			$namest = true;
			$urlfcount = $urlcnt;
			
		}else{
		}
		$urlcnt++;
	}
	if($namest){
		echo "Good Url Exists!";
		$namest = false;
		
		for($i=0;$i<$rowcounter;$i++){
			$rowcount = $final[$i];
			$rowtest = $rowcount[$urlfcount];
					if(!stristr($rowtest, 'url') && $rowtest != ""){
						sleep(3);
						//Start Bulk Search 
					$c2urls = new companytourl();
					$urlp = $c2urls->get_domain($rowtest);
					$ar = "";
					$gsearch = 'EMAILS'.' '. '"@'.$urlp.'"';
					$bysearch = '[@'.$urlp.']';
					$yandex = '"@'.$urlp.'"';
					$results = $c2urls->fetch_google_result($gsearch,'2');
					$ar .= strip_tags($results);
					$resultsb = $c2urls->fetch_bing_result($bysearch);
					$ar .= strip_tags($resultsb);
					//$resultsd = $c2urls->fetch_yandex_result($yandex);
					//$ar .= strip_tags($resultsd);
					$emails = $c2urls->extract_emails_from($ar,$urlp);
					//echo $emails;
					$email_array = explode("</br>",$emails);
					echo $patern_check_array_count = count($email_array);
					for($k=0;$k<$patern_check_array_count;$k++){
						if($kmc == 0){
							$forxlsxdata[$kmc] = array('Url','Email');
						}else{
							if($email_array[$k-1] != null){
							$forxlsxdata[$kmc] = array($rowtest,$email_array[$k-1]);
							}
						}
						$kmc++;
					}
					
					// store it into excel ================================================
							
					}else{
						
					}
			
		}
		if (!file_exists($main_file_name)) {
		foreach($forxlsxdata as $row){
		$writer->writeSheetRow('Sheet1', $row);
		}		
} else {
    echo "The file $main_file_name does not exist";
}
$writer->writeToFile($main_file_name);
			//foreach($forxlsxdata as $test){
				//print_r($test) ;
				//echo "</br>";
			//}
	}else{
		$namest = false;
		echo "Excel File without Url Cannot Be Used. Please Upload a new File";
		// delete particular code
	}
}
?>