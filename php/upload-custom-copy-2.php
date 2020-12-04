<?php
date_default_timezone_set('UTC');
require('../classes/xlsxreader.php');
require('../classes/class.customsearch.php');
require("../classes/class.validatemail.php");
require('../classes/xlsxwriter.php');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
//========================================================mail validation function ======================================
$match = array("CEO","President","Owner","CMO","Chief Marketing Officer","VP of Marketing","VP Marketing","Digital Marketing Manager","Event Coordinator","Event manager","Product marketing manager","Director brand marketing","Director of brand marketing","Digital marketing specialist","Director email marketing","Director of email marketing","Demand generation manager","Campaign manager","Marketing Database Manager","Director Marketing","Director web marketing","Director of web marketing","Affiliate marketing manager","Channel marketing director","Digital media director","VP Business Development","Business Development Director","Global Sales","VP of Sales","VP Sales","Director of Sales","Director Sales","Regional Sales Manager","Head of Sales","Sales Engineer","Business Development Manager","Sales Manager","Chief Sales Officer","Marketing Manager");
global $trip;
$trip = "2";
function mainvalidationemail($email,$no){
        global $trip;
        $eid = $email; 
		
        $vemail = new validateEmail();
		$vemail->setEmailFrom("info@lexusenergy.com");
		$vemail->check($eid);
		if($vemail->check($eid)){
			if($vemail->checkmx($eid)){
				$oserv = $vemail->smtpval($eid);
				if($oserv == "21" || $oserv == "22" || $oserv == "23"){
					$mailtestdata = $vemail->mailtester($eid);
						if ($mailtestdata == ""){
							$trip = "4";
							return false;
						}else if($mailtestdata == "Good" || $mailtestdata == "Excellent"){
							return true;
						}else if($mailtestdata == "Bad"){
							return false;
						}else if($mailtestdata == "Bad2" && $no > "2"){
							$trip = "4";
							return false;
						}else if($mailtestdata == "Unknown" && $no > "2"){
							$trip = "4";
							return false;
						}else{
							$trip = "4";
							return false;
						}
				}else if($oserv == "20"){
				return true;
                }else{
                    return false;
                }
			}else{
				$trip = "4";
				return false;
			}
		}else{
			$trip = "4";
			return false;
		}
	}
	
	// mail validation function
	
if($_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = rand(100,999).'.'.$extension;

    $locationofxlsx = '../database_custom/'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $locationofxlsx);
	$location = "../database_custom/";
$main_file_name = $location."response".$name;
$main_file_name_2 = $location.$name;
if(!file_exists($main_file_name_2)){
	echo "File Does not Exists";
	die;
}
echo "File 	Uploaded, Processing The File,Please Wait......";
for($c=0;$c<40000;$c++)echo " ";
flush();
$xlsx = new XLSXReader($location.$name); // Use Session to Get file name
$sheetNames = $xlsx->getSheetNames();
$namest = false;
$companyst = false;
$urlcnt = 0;
$urlfcount = 0;
$urlfcountcom = 0;
$filenametocreatexlsxdata = $location."response".$name;
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
	$rowcounter =  count($final);
	$rowcount = $final[0];
	foreach($rowcount as $rowcnt){
		if(stristr($rowcnt, 'url')){
			$namest = true;
			$urlfcount = $urlcnt;
			
		}elseif(stristr($rowcnt, 'company')){
			$companyst = true;
			$urlfcountcom = $urlcnt;
		}else{
		}
		$urlcnt++;
	}
	if($namest&&$companyst){
		$namest = false;
		$companyst = false;
		for($i=0;$i<$rowcounter;$i++){
			$rowcount = $final[$i];
			$rowtest = $rowcount[$urlfcount];
			$rowtestcom = $rowcount[$urlfcountcom];
					if(!stristr($rowtest, 'url') && $rowtest != "" && !stristr($rowtestcom, 'company') && $rowtestcom != ""){
						sleep(3);
						
						//==================================================bulk search to find Topology====================
								$c2urls = new companytourl();
								$urlp = $c2urls->get_domain($rowtest);
								$ar = "";
								$gsearch = 'EMAILS'.' '. '"@'.$urlp.'"';
								$bysearch = '[@'.$urlp.']';
								$yandex = '"@'.$urlp.'"';
								$results = $c2urls->fetch_google_result($gsearch,'2');
								
							$fh = fopen("C:\\xampp\htdocs\optin\main\data-bulk-diag.txt", 'w') or die("Failed to read file"); 
								fwrite($fh, $results);
								fclose($fh);
								if(stristr($results,"302 Moved")){ // Google Capatcha Solving
									$dom = new DOMDocument(1.0);
									@$dom->loadHTML($results);
								   foreach ($dom->getElementsByTagName('a') as $node) {
								   $caplink = $node->getAttribute('href');
								   }
								   echo "^*".$caplink."^*";
									for($z=0;$z<40000;$z++) echo ' ';
									flush();
									sleep(2);
								   $buffer = "";
								$fh = fopen("C:\\xampp\htdocs\optin\main\data-stat.txt", 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(3);
									$fh = fopen("C:\\xampp\htdocs\optin\main\data-stat.txt", 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								
								$handle = fopen("C:\\xampp\htdocs\optin\main\data.txt", 'r') or die("Failed to read file"); 
								if($handle){
									while (!feof($handle)) {
									$gssrcap = fgets($handle, 4096);
									$buffer .= $gssrcap;
									// Process buffer here..
									}
									fclose($handle);
								}
								//echo "dONE";
								$results = $buffer;
								$fh = fopen("C:\\xampp\htdocs\optin\main\data-stat.txt", 'w') or die("Failed to read file"); 
								$txt2 = "0";
								fwrite($fh, $txt2);
								fclose($fh);
								sleep(1);
								}
								///===========================================================Google Capatcha Solving End For Bulk Search
								$ar .= strip_tags($results);
								//$resultsb = $c2urls->fetch_bing_result($bysearch);
								//$ar .= strip_tags($resultsb);
								//$resultsd = $c2urls->fetch_yandex_result($yandex);
								//$ar .= strip_tags($resultsd);
								$emails = $c2urls->extract_emails_from($ar,$urlp);
								//echo $emails;
								$patern_check_array = explode("</br>",$emails);
								$patern_check_array_count = count($patern_check_array)- 1;
								if($patern_check_array_count >= 2){
									$emailsres = $c2urls->process_email_topology($patern_check_array[0],$patern_check_array[1],$patern_check_array[2]);
									//echo $emailsres;
								}else{
									$emailsres = 0;
								}
							//==================================================
								$gss = new custom_search();
							$gssr = $gss->google_custom_result("",$rowtestcom);
							//============================debug_bug
							
							$fh = fopen("C:\\xampp\htdocs\optin\main\data-cust-diag.txt", 'w') or die("Failed to read file"); 
								fwrite($fh, $gssr);
								fclose($fh);
							
							
							//======================================
							if(stristr($gssr,"302 Moved")){
								$dom = new DOMDocument(1.0);
								@$dom->loadHTML($gssr);
							   foreach ($dom->getElementsByTagName('a') as $node) {
								$caplink = $node->getAttribute('href');
								//print "<script type=\"text/javascript\">\n";
								//print "window.open('".$caplink."','_blank');\n";
								//print "</script>";
								//echo $caplink;
									
								//echo "</br>";
								//echo "<iframe title=\"YouTube video player\" width=\"640\" height=\"390\" \n"; 
								//echo " src=\"$caplink/\" \n"; 
								//echo "frameborder=\"0\" allowfullscreen></iframe> \n";
								//echo companytourl::curl($caplink,"https://www.google.co.in");
							   }
							 
								echo "^*".$caplink."^*";
								for($z=0;$z<40000;$z++) echo ' ';
								flush();
								sleep(2);
								
								
							 //for($z=0;$z<40000;$z++) echo ' ';
								$buffer = "";
								$fh = fopen("C:\\xampp\htdocs\optin\main\data-stat.txt", 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(1);
									$fh = fopen("C:\\xampp\htdocs\optin\main\data-stat.txt", 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								$handle = fopen("C:\\xampp\htdocs\optin\main\data.txt", 'r') or die("Failed to read file"); 
								if($handle){
									while (!feof($handle)) {
									$gssrcap = fgets($handle, 4096);
									$buffer .= $gssrcap;
									// Process buffer here..
									}
									fclose($handle);
								}
								//echo "dONE";
								$gssr = $buffer;
								$fh = fopen("C:\\xampp\htdocs\optin\main\data-stat.txt", 'w') or die("Failed to read file"); 
								$txt2 = "0";
								fwrite($fh, $txt2);
								fclose($fh);
								sleep(2);
							}
							$testresult = $gss->process_google_for_val($gssr,$company_name);
							$ctr2 = 1;
							foreach($testresult as $results){
								//echo $results;
								//echo "</br>";
								//echo "</br>";
								$proresults = explode(" - ", $results);
								if(!$proresults[0]){
									$proresults[0] = "NA";
								}else if(!$proresults[1]){
									$proresults[1] = "NA";
								}else if(!$proresults[2]){
									$proresults[2] = "NA";
								}
									foreach($match as $matchstick){
									$gss_match = $gss->patterncheck($matchstick, $proresults[1]);
									//echo "</br>";	
										if($gss_match >= 50){
											break;
										}
									}
									
								//echo "Name: ".$proresults[0];
								///echo "</br>";
								//echo "</br>";
								//echo "Designation: ".$proresults[1];
								//echo "</br>";
								//echo "</br>";
								//echo "Company Name: ".$proresults[2];
								//echo "</br>";
								//echo "</br>";
								$testresult2 = $gss->bfr_email_permuator($proresults[0]);
								if($testresult2 && $gss_match >= 50){
									
									$bfepc = count($testresult2);
									if($bfepc == 1){
										$eps = $gss->emailpremuator_pattern($testresult2[0],"","",$rowtest,$emailsres);
									}else if($bfepc == 2){
										$eps = $gss->emailpremuator_pattern($testresult2[0],"",$testresult2[1],$rowtest,$emailsres);
									}else if($bfepc == 3){
										$eps = $gss->emailpremuator_pattern($testresult2[0],$testresult2[1],$testresult2[2],$rowtest,$emailsres);
									}
									$ctr = 1;
									$ctr3 = 0;
									
									foreach($eps as $epr){//implement mail validation tool here
											//echo $epr;
											 //sleep(2);
											//if(mainvalidationemail($epr,$ctr)){ //Make a response File
												//if($ctr3 == 0){
												//	$forxlsxdata = array('Company','Url','Name','Designation','Email','Status');
												//}//else{
												//	$forxlsxdata = array($rowtestcom,$rowtest,$proresults[0],$proresults[1],$epr,'Success');
												//}
											//}else{
												//if($trip == "4"){
												//	break;
												//}
											//}
												$array_count_to_inc = count($forxlsxdata);
												if($array_count_to_inc == 0){
													$forxlsxdata[0] = array('Company','Url','Name','Designation','Email','Status');
												}else{
												$forxlsxdata[$array_count_to_inc] = array($rowtestcom,$rowtest,$proresults[0],$proresults[1],$epr,'Success');
												}
												
											$ctr3++;
											$ctr++;
											$ctr2 = $ctr2 + 1;
									} 
									if($trip == "4"){
										$trip = "2";
										foreach($eps as $epr){
											$array_count_to_inc = count($forxlsxdata);
											$forxlsxdata[$array_count_to_inc] = array($rowtestcom,$rowtest,$proresults[0],$proresults[1],$epr,'Failed');
										}
									} 
								}else {
									//echo "invalid";
									//echo "</br>";

								}
							}
					
							
					}else{
										foreach($eps as $epr){
											$array_count_to_inc = count($forxlsxdata);
											$forxlsxdata[$array_count_to_inc] = array($rowtestcom,$rowtest,$proresults[0],$proresults[1],$epr,'Failed');
											break;
										}
					}
			
		}
		if (!file_exists($main_file_name)) {
				foreach($forxlsxdata as $row){
					//print_r($row);
				$writer->writeSheetRow('Sheet1', $row);
				}		
		} else {
			echo "The file $main_file_name does not exist";
		}
			$writer->writeToFile($main_file_name);
			echo "Saved To File";
			//foreach($forxlsxdata as $test){
				//print_r($test) ;
				//echo "</br>";
			//}
	}else{
		$namest = false;
		$companyst = false;
		echo "Excel File without Company and Url  Cannot Be Used. Please Upload a new File";
		if (file_exists($main_file_name)) {
			unlink($main_file_name_2);
		}else{
		
		// delete particular code
	}
}
}
}


?>