
<?php 
include("./db_v2/config.php");
require('./classes_v2/xlsxreader.php');
require('./classes_v2/class.customsearch.php');
require("./classes_v2/class.validatemail.php");
//require('./classes_v2/class.c2url.php');
require('./classes_v2/xlsxwriter.php');
date_default_timezone_set('America/Chicago');
$date = date('Y-m-d');
$username =  "stanley.dave";
$mail_type = "text";
$match = array("CEO","President","Owner","CMO","Chief Marketing Officer","VP of Marketing","VP Marketing","Digital Marketing Manager","Event Coordinator","Event manager","Product marketing manager","Director brand marketing","Director of brand marketing","Digital marketing specialist","Director email marketing","Director of email marketing","Demand generation manager","Campaign manager","Marketing Database Manager","Director Marketing","Director web marketing","Director of web marketing","Affiliate marketing manager","Channel marketing director","Digital media director","VP Business Development","Business Development Director","Global Sales","VP of Sales","VP Sales","Director of Sales","Director Sales","Regional Sales Manager","Head of Sales","Sales Engineer","Business Development Manager","Sales Manager","Chief Sales Officer","Marketing Manager");
//===========================================================================
function savefile($fname, $val){
$fp = fopen($fname, 'a');
fputcsv($fp, $val);
fclose($fp);
}
//===========================================================================
function prase_via_google_via_proxy($company,$country,$no){
	$c2urls = new companytourl();
	 $search = "website + " .$company. "+ " .$country;
	$links = $c2urls->fetch_google_result_via_proxy($search,'1',$no); // 1 for company2URL Search and 2 For 100 Listing Seach $results = $c2urls->fetch_google_result_via_proxy($gsearch,'2',$nval)
	
	if(stristr($links,"302 Moved")){ // Google Capatcha Solving
			session_start();
			
			if(isset($_SESSION['optin_user'])){
				$temp_user = $_SESSION["optin_user"];
			$user_name = str_ireplace("optin_","",$temp_user);
		$file_loc = "../test/".$user_name."-all-user.txt";
		$file_loc_2 = "../test/".$user_name."-all-user-data.txt";
				if (!(file_exists($file_loc))) {
				$fh = fopen($file_loc, 'a');
				$fhd = 0;
				fwrite($fh,$fhd);
				fclose($fh);
				$fh = fopen($file_loc_2, 'a');
				$fhd = "";
				fwrite($fh,$fhd);
				fclose($fh);
			}
				
			}
									$dom = new DOMDocument(1.0);
									@$dom->loadHTML($links);
								   foreach ($dom->getElementsByTagName('a') as $node) {
								   $caplink = $node->getAttribute('href');
								   }
								   echo "^*".$caplink."^*";
									for($z=0;$z<40000;$z++) echo ' ';
									flush();
									sleep(2);
								   $buffer = "";
								$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(1);
									$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								$handle = fopen($file_loc_2, 'r') or die("Failed to read file"); 
								if($handle){
									while (!feof($handle)) {
									$gssrcap = fgets($handle, 4096);
									$buffer .= $gssrcap;
									// Process buffer here..
									}
								}
								//echo "dONE";
								$links = $buffer;
								$fh = fopen($file_loc_2, 'w') or die("Failed to read file"); 
								$txt2 = "0";
								fwrite($fh, $txt2);
								fclose($fh);
								sleep(1);
								}
								
    $caparray = $c2urls->process_google_results_proxy($links,$company); 
	
	if (!count($caparray)){
		return false;	
	}else{
		return $caparray;
	}
}
//===========================================================================
function mainvalidationemail($email,$no){
        global $trip;
        $eid = $email; 		
        $vemail = new validateEmail();
		$vemail->setEmailFrom("info@researchtool.online");
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
//========================Get ALL Pending Task===============================
while(1){
	$task = get_all_pending_Task($username);
	if($task){
		foreach ($task as $tas){
			if($tas["typeofsearch"] == "BULK"){// check if type of search Bulk
				$filename = $tas["fileloc"];
				$filename = str_ireplace('../','./',$filename);
				$xlsx = new XLSXReader($filename);
				$sheetNames = $xlsx->getSheetNames();
				$sheet = $xlsx->getSheet($sheetNames[1]);
				$final = $sheet->getData();
				$final_count = count($final);
				$namest = false;
				$urlcnt = 0;
				$urlfcount = 0;
				$forxlsxdata = array();
				$writer = new XLSXWriter();
				$writer->setAuthor('Optin Prospects'); 
				$kmc = 0;
				//========count if data exists else close the activity====
				if($final_count){
//========*******STARTOFBULKSEARCH******************************************************
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
//=====================================Create output excel file and csv===============================================
$filearray = explode('/',$filename);
$Output_File_Name = "abemail-".$tas["campaign_name"]."-".rand(1,100)."-".$filearray[3];
$Output_File_Loc = "./optin_db_folder_v2/".$filearray[2]."/".$Output_File_Name;
$newcsvfile = "csvabemail-".rand(1,100).".csv";
$newcsvfileloc = "./optin_db_folder_v2/".$username."/".$newcsvfile;
if (!file_exists($newcsvfileloc)) {
	$fh = fopen($newcsvfileloc, 'w');
}
$file_loc = "./optin_db_folder_v2/".$username."/".$Output_File_Name;
if (!file_exists('./optin_db_folder_v2/'.$username)) {
	mkdir('./optin_db_folder_v2/'.$username, 0777, true);
}
//=====================================Check if output file Exists==== 
if(file_exists($Output_File_Loc)){
	echo "</br>";
	echo "File Exists cannot Proceed Further. Please Create a New Campagin";
	die;
}else{
	echo "Processing File".$filearray[3].". Please wait...";	
}
for($c=0;$c<40000;$c++)echo " ";
flush();
//============================================================================

if(count($sheetNames) == 0 || count($sheetNames) == ""){
	echo "Empty File Cannot Proceed";
	for($c=0;$c<40000;$c++)echo " ";
	flush();
}else{
	// fetch total no of rows in excel
	$rowcounter =  count($final);
	$rowcount = $final[0];
	//===========================================
	foreach($rowcount as $rowcnt){
		if(stristr($rowcnt, 'url')){ // check if url feild exist in the excel file
			$namest = true;
			$urlfcount = $urlcnt;
		}else{
		}
		$urlcnt++;
	}
	if($namest){ // if everything fine Proeed
		echo "Good Url Exists!";
		$namest = false;//===========================================================================================
		//session_start();
			// write log files ======================================================
			/* if(isset($username)){
		$user_name = $username;
		$file_loc = "./test_v2/".$user_name."-all-user.txt";
		$file_loc_2 = "./test_v2/".$user_name."-all-user-data.txt";
					if (!(file_exists($file_loc))) {
					$fh = fopen($file_loc, 'a');
					$fhd = 0;
					fwrite($fh,$fhd);
					fclose($fh);
					$fh = fopen($file_loc_2, 'a');
					$fhd = "";
					fwrite($fh,$fhd);
					fclose($fh);
				}
				
			}else{
				header('location: ../index.php');
			} */
//===============================================================================
update_count($tas["sl_no"], 'percentage3', 100);
update_count($tas["sl_no"], 'percentage2', 100);
//==================================================================================
update_filename($tas["sl_no"], $newcsvfileloc);
for($i=0;$i<$rowcounter;$i++){ // starting to process file
			$rowcount = $final[$i];
			$rowtest = $rowcount[$urlfcount];
					if(!stristr($rowtest, 'url') && $rowtest != ""){
						sleep(0);
						$fh = fopen("stat.txt", 'a') or die("Failed to read file"); 
						fwrite($fh, $rowtest);
						fclose($fh);
//====================================================================================
//==========================================================================
						$c2urls = new companytourl();
								$urlp = $c2urls->get_domain($rowtest);
								$ar = "";
								$gsearch = 'EMAILS'.' '. '"@'.$urlp.'"';
								$bysearch = '[@'.$urlp.']';
								$yandex = '"@'.$urlp.'"';
								$nval = $i;
								//$results = $c2urls->fetch_google_result($gsearch,'2');
								 $results = $c2urls->fetch_google_result_via_proxy($gsearch,'2', $nval);
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
								$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(2);
									$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								$handle = fopen($file_loc_2, 'r') or die("Failed to read file"); 
								if($handle){
									while (!feof($handle)) {
									$gssrcap = fgets($handle, 4096);
									$buffer .= $gssrcap;
									// Process buffer here..
									}
								}
								//echo "dONE";
								sleep(1);
								$results = $buffer;
								$fh = fopen($file_loc, 'w') or die("Failed to read file"); 
								$txt2 = "0";
								fwrite($fh, $txt2);
								fclose($fh);
								
								}
								///===========================================================Google Capatcha Solving End For Bulk Search
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
										savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added
									}else{
										if($email_array[$k-1] != null){
										$forxlsxdata[$kmc] = array($rowtest,$email_array[$k-1]);
										savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added 
										}
									}
									$kmc++;
								}
					
							
					}else{
						
					}
			sleep(1);
			update_count($tas["sl_no"],'email_gathering', $nval);
			//update Percentage
			$final_count2 = $final_count - 1;
			$per = ($nval / $final_count2)*100;
			update_count($tas["sl_no"],'percentage1', $per);
		}
//===================================================================================		
		if (!file_exists($Output_File_Loc)) {
			foreach($forxlsxdata as $row){
			$writer->writeSheetRow('Sheet1', $row);
			}		
		} else {
			$msg = "Excel File Exist, Download CSV File";
			update_error_msg($tas["sl_no"], $msg, 2);
			
		}
$writer->writeToFile($Output_File_Loc);
echo "Saved To File";
//===Store Success in Database======================================
update_success_msg($tas["sl_no"], "Data Saved Successfully", 1);
update_filename($tas["sl_no"], $Output_File_Loc);
//===============================================
	}else{
		$namest = false;
		$msg = "Excel File without Url Cannot Be Used. Please Upload a new File";
		update_error_msg($tas["sl_no"], $msg, 2);
		//update error msg;
	}
}
//============*****ENDOFBULK***********************************
				}else{
					// update database with error report of invalid file type
					$msg = "Empty Excel File";
					update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
				}
				//=============Bulk Search Process============
			}else if($tas["typeofsearch"] == "MAILVAL"){
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);


//*****************************Start OF MAILVAL********************************************************
				$filename = $tas["fileloc"];
				$filename = str_ireplace('../','./',$filename);
				$xlsx = new XLSXReader($filename);
				$sheetNames = $xlsx->getSheetNames();
				$sheet = $xlsx->getSheet($sheetNames[1]);
				$final = $sheet->getData();
				$final_count = count($final);
				$namest = false;
				$urlcnt = 0;
				$urlfcount = 0;
				$forxlsxdata = array();
				$writer = new XLSXWriter();
				$writer->setAuthor('Optin Prospects'); 
				$kmc = 0;
				$nvalal = 0;
				//========count if data exists else close the activity====
				if($final_count){
					$filearray = explode('/',$filename);
$Output_File_NameMalV = "amailval-".$tas["campaign_name"]."-".rand(1,100)."-".$filearray[3];
$Output_File_LocMalV = "./optin_db_folder_v2/".$filearray[2]."/".$Output_File_NameMalV;
$newcsvfile = "csvamailval-".rand(1,100).".csv";
$newcsvfileloc = "./optin_db_folder_v2/".$username."/".$newcsvfile;
if (!file_exists($newcsvfileloc)) {
	$fh = fopen($newcsvfileloc, 'w');
}
$file_loc = "./optin_db_folder_v2/".$username."/".$Output_File_NameMalV;
if (!file_exists('./optin_db_folder_v2/'.$username)) {
	mkdir('./optin_db_folder_v2/'.$username, 0777, true);
}
//=====================================Check if output file Exists==== 
if(file_exists($Output_File_LocMalV)){
	echo "</br>";
	echo "File Exists cannot Proceed Further. Please Create a New Campagin";
	die;
}else{
	echo "Processing File".$filearray[3].". Please wait...";	
}
for($c=0;$c<40000;$c++)echo " ";
flush();
//=============================================Mail Val Process=======================
if(count($sheetNames) == 0 || count($sheetNames) == ""){
	echo "Empty File Cannot Proceed";
}else{
	//$sheetNames = $xlsx->getSheetNames();
	$sheet = $xlsx->getSheet($sheetNames[1]);
	$final = $sheet->getData();
	$rowcounter =  count($final);
	$rowcount = $final[0];
	$rowhorizontal = count($rowcount);
	if($rowhorizontal == 2 && stristr($rowcount[0], 'url')){
		$ftype = "BUL";
	}else if($rowhorizontal == 6 && stristr($rowcount[0], 'company')){
		$ftype = "COS";
	}else{
		$msg = "Sorry Unsupported File Format";
		update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
	}
	foreach($rowcount as $rowcnt){
		if(stristr($rowcnt, 'Email')){
			$namest = true;
			$urlfcount = $urlcnt;
			
		}else{
		}
		$urlcnt++;
	}
	if($namest){
		echo "Good Company Name Exists!";
		$namest = false;
		///===========================================================================================
		update_count($tas["sl_no"], 'percentage3', 100);
		update_count($tas["sl_no"], 'percentage1', 100);
		update_filename($tas["sl_no"], $newcsvfileloc);
		//==========================================================================================
		for($i=0;$i<$rowcounter;$i++){
			$rowcount = $final[$i];
			$rowtest = $rowcount[$urlfcount];
					if(!stristr($rowtest, 'Email') && $rowtest != ""){
						sleep(1);
						
						$urlcurrent = explode('@',$rowtest);
						if($urlcurrent[1] == $urlold){
							$urlctr++;
						}else{
							$urlctr = 0;
							$urlold = $urlcurrent[1];
							$trip = "2";
						}
						
						
						//==========================================================================
								$valstatraw = mainvalidationemail($rowtest,$urlctr);
								if($valstatraw){
									$valstat = "Success";
								}else if($urlcurrent[1] == $urlold && $trip == "4"){
									$valstat = "Failed";
								}else{
									$valstat = "Moderate";
								}
								//process vall
								
								//========================
								
								if($kmc == 0 && $ftype == "COS"){
									$forxlsxdata[$kmc] = array('Company','Url','Name','Designation', 'Email', 'Result');
									savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added
								}else if($kmc == 0 && $ftype == "BUL"){
									$forxlsxdata[$kmc] = array('Url','Email','Result');
									savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added
								}else if($kmc != 0 && $ftype == "BUL"){
									$forxlsxdata[$kmc] = array($rowcount[0], $rowtest, $valstat);
									savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added
								}else if($kmc != 0 && $ftype == "COS"){
									$forxlsxdata[$kmc] = array($rowcount[0], $rowcount[1], $rowcount[2], $rowcount[3], $rowtest, $valstat);
									savefile($newcsvfileloc, $forxlsxdata[$kmc]);// newly added
								}else{
									$msg = "Error: Unexpected Condition!";
									update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
								}
								$kmc++;
								
								
								
								
								
					
					// store it into excel ================================================
							
					}else{
						if($ftype == "BUL"){
							$forxlsxdata[0] = array('Company-name','Url');
							savefile($newcsvfileloc, $forxlsxdata[0]);// newly added
						}else if ($ftype == "COS"){
							$forxlsxdata[0] = array('Company','Url','Name','Designation', 'Email', 'Result');
							savefile($newcsvfileloc, $forxlsxdata[0]);// newly added
						}else{
							$msg = "Error: Unexpected Condition! Loc2";
							update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
						}
						$kmc++;
					}
			sleep(0);
			update_count($tas["sl_no"],'email_gathering', $nval);
			//update Percentage
			$final_count2 = $final_count - 1;
			$per = ($nvalal / $final_count2)*100;
			update_count($tas["sl_no"],'percentage2', $per);
			$nvalal++;
			}
		
		if (!file_exists($Output_File_NameMalV)) {
		foreach($forxlsxdata as $row){
		$writer->writeSheetRow('Sheet1', $row);
		}		
} else {
    echo "The file $main_file_name exist";
	
}
$writer->writeToFile($Output_File_NameMalV);
echo "Saved To File";
update_count($tas["sl_no"],'percentage2', 100);
update_success_msg($tas["sl_no"], "Data Saved Successfully", 1);
update_filename($tas["sl_no"], $Output_File_NameMalV);
echo $Output_File_NameMalV;
			//foreach($forxlsxdata as $test){
				//print_r($test) ;
				//echo "</br>";
			//}
	}else{
		$namest = false;
		$msg = "Excel File without Url Cannot Be Used. Please Upload a new File";
		update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
		
}
}
//=====================================================================================
					//Mail Validation Here
				}else{
					// update database with error report of invalid file type
					$msg = "Empty Excel File";
					update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
				}
//========*******STARTOFBULKSEARCH******************************************************

//*************************End OF MAILVAL**************************************************************
			}else if($tas["typeofsearch"] == "CTOURL"){
				$filename = $tas["fileloc"];
//********************Company to URL******************************************************************
//==============================Reading And File Creation===
$filename = $tas["fileloc"];
				$filename = str_ireplace('../','./',$filename);
				$xlsx = new XLSXReader($filename);
				$sheetNames = $xlsx->getSheetNames();
				$sheet = $xlsx->getSheet($sheetNames[1]);
				$final = $sheet->getData();
				$final_count = count($final);
				$namest = false;
				$urlcnt = 0;
				$urlfcount = 0;
				$forxlsxdata = array();
				$writer = new XLSXWriter();
				$writer->setAuthor('Optin Prospects'); 
				$kmc = 0;
				$nvalal = 1;
				//========count if data exists else close the activity====
				if($final_count){
//========*******STARTOFBULKSEARCH******************************************************
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
//=====================================Create output excel file and csv===============================================
$filearray = explode('/',$filename);
$Output_File_Name = "actourl-".$tas["campaign_name"]."-".rand(1,100)."-".$filearray[3];
$Output_File_Loc = "./optin_db_folder_v2/".$filearray[2]."/".$Output_File_Name;
$newcsvfile = "csvactourl-".rand(1,100).".csv";
$newcsvfileloc = "./optin_db_folder_v2/".$username."/".$newcsvfile;
if (!file_exists($newcsvfileloc)) {
	$fh = fopen($newcsvfileloc, 'w');
}
$file_loc = "./optin_db_folder_v2/".$username."/".$Output_File_Name;
if (!file_exists('./optin_db_folder_v2/'.$username)) {
	mkdir('./optin_db_folder_v2/'.$username, 0777, true);
}
//=====================================Check if output file Exists==== 
if(file_exists($Output_File_Loc)){
	echo "</br>";
	echo "File Exists cannot Proceed Further. Please Create a New Campagin";
	die;
}else{
	echo "Processing File".$filearray[3].". Please wait...";	
}
for($c=0;$c<40000;$c++)echo " ";
flush();
//==============================================================================================
if(count($sheetNames) == 0 || count($sheetNames) == ""){
	echo "Empty File Cannot Proceed";
}else{
	//$sheetNames = $xlsx->getSheetNames();
	$sheet = $xlsx->getSheet($sheetNames[1]);
	$final = $sheet->getData();
	echo $rowcounter =  count($final);
	$rowcount = $final[0];
	foreach($rowcount as $rowcnt){
		if(stristr($rowcnt, 'company-name')){
			$namest = true;
			$urlfcount = $urlcnt;
			
		}else{
		}
		$urlcnt++;
	}
	if($namest){
		echo "Good Company Name Exists!";
		$namest = false;
		update_count($tas["sl_no"], 'percentage3', 100);
		update_count($tas["sl_no"], 'percentage2', 100);
		///===========================================================================================
		//==========================================================================================
		for($i=0;$i<$rowcounter;$i++){
			$rowcount = $final[$i];
			echo $rowtest = $rowcount[$urlfcount];
					if(!stristr($rowtest, 'company-name') && $rowtest != ""){
						sleep(1);
						
						
						//==========================================================================
						$c2urls = new companytourl();
						$result = NULL;//$c2urls->fetch_clearbit_result($rowtest);
						$results_array = json_decode($result,true);
						$ctr = 1;
								if(!count($results_array)){
										$ctr = 1;
										$outbuf = prase_via_google_via_proxy($rowtest,'',$ctr);
										echo $outdata = $outbuf;
										$ctr++;
								}else{
										echo $outdata = $results_array[0]['domain'];
										
								}
								
								if($kmc == 0){
										$forxlsxdata[$kmc] = array('Company-name','Url');
									}else{
										$forxlsxdata[$kmc] = array($rowtest,$outdata);
									}
									$kmc++;
								
								
								
								
								
					
					// store it into excel ================================================
							
					}else{
						$forxlsxdata[0] = array('Company-name','Url');
						$kmc++;
					}
					sleep(1);
			update_count($tas["sl_no"],'email_gathering', $nval);
			//update Percentage
			$final_count2 = $final_count - 1;
			$per = ($nvalal / $final_count2)*100;
			update_count($tas["sl_no"],'percentage1', $per);
			$nvalal++;
		}
		
		if (!file_exists($Output_File_Loc)) {
		foreach($forxlsxdata as $row){
		$writer->writeSheetRow('Sheet1', $row);
		}		
} else {
    echo "The file $main_file_name exist";
	
}
$writer->writeToFile($Output_File_Loc);
echo "Saved To File";
update_success_msg($tas["sl_no"], "Data Saved Successfully", 1);
update_filename($tas["sl_no"], $Output_File_Loc);
			//foreach($forxlsxdata as $test){
				//print_r($test) ;
				//echo "</br>";
			//}
	}
}
}
//******End OF MAILVAL*********************************************************************************
			}else if($tas["typeofsearch"] == "CUSTOM"){
//******************************STARTOFCUSTOMSEARCH*****************************************************************************************************
				$filename = $tas["fileloc"];
				$filename = str_ireplace('../','./',$filename);
				$xlsx = new XLSXReader($filename);
				$sheetNames = $xlsx->getSheetNames();
				$sheet = $xlsx->getSheet($sheetNames[1]);
				$final = $sheet->getData();
				$final_count = count($final);
				$namest = false;
				$urlcnt = 0;
				$urlfcount = 0;
				$forxlsxdata = array();
				$writer = new XLSXWriter();
				$writer->setAuthor('Optin Prospects'); 
				$kmc = 0;
				//========count if data exists else close the activity====
				if($final_count){
//========*******STARTOFBULKSEARCH******************************************************
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
//=====================================Create output excel file and csv===============================================
$filearray = explode('/',$filename);
$Output_File_Name = "acemail-".$tas["campaign_name"]."-".rand(1,100)."-".$filearray[3];
$Output_File_Loc = "./optin_db_folder_v2/".$filearray[2]."/".$Output_File_Name;
$Output_File_NameM = "acemailmailval-".$tas["campaign_name"]."-".rand(1,100)."-".$filearray[3];
$Output_File_LocM = "./optin_db_folder_v2/".$filearray[2]."/".$Output_File_NameM;
$Output_File_NameF = "acemailmailftr-".$tas["campaign_name"]."-".rand(1,100)."-".$filearray[3];
$Output_File_LocF = "./optin_db_folder_v2/".$filearray[2]."/".$Output_File_NameF;
$newcsvfile = "csvacemail-".rand(1,100).".csv";
$newcsvfileloc = "./optin_db_folder_v2/".$username."/".$newcsvfile;
$newcsvfileM = "csvacemailval-".rand(1,100).".csv";
$newcsvfilelocM = "./optin_db_folder_v2/".$username."/".$newcsvfileM;
$newcsvfileF = "csvacemailvalfltr-".rand(1,100).".csv";
$newcsvfilelocF = "./optin_db_folder_v2/".$username."/".$newcsvfileF;
if (!file_exists($newcsvfileloc)) {
	$fh = fopen($newcsvfileloc, 'w');
}
if (!file_exists($newcsvfilelocM)) {
	$fh = fopen($newcsvfilelocM, 'w');
}
if (!file_exists($newcsvfilelocF)) {
	$fh = fopen($newcsvfilelocF, 'w');
}
$file_loc = "./optin_db_folder_v2/".$username."/".$Output_File_Name;
if (!file_exists('./optin_db_folder_v2/'.$username)) {
	mkdir('./optin_db_folder_v2/'.$username, 0777, true);
}
//=====================================Check if output file Exists==== 
if(file_exists($Output_File_Loc)){
	echo "</br>";
	echo "File Exists cannot Proceed Further. Please Create a New Campagin";
	die;
}else{
	echo "Processing File".$filearray[3].". Please wait...";	
}
for($c=0;$c<40000;$c++)echo " ";
flush();
//============================================================================

if(count($sheetNames) == 0 || count($sheetNames) == ""){
	echo "Empty File Cannot Proceed";
	for($c=0;$c<40000;$c++)echo " ";
	flush();
}else{
	// fetch total no of rows in excel
	$rowcounter =  count($final);
	$rowcount = $final[0];
	//===========================================
	
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
		$companyst = false;//===========================================================================================
		//session_start();
			// write log files ======================================================
			/* if(isset($username)){
		$user_name = $username;
		$file_loc = "./test_v2/".$user_name."-all-user.txt";
		$file_loc_2 = "./test_v2/".$user_name."-all-user-data.txt";
					if (!(file_exists($file_loc))) {
					$fh = fopen($file_loc, 'a');
					$fhd = 0;
					fwrite($fh,$fhd);
					fclose($fh);
					$fh = fopen($file_loc_2, 'a');
					$fhd = "";
					fwrite($fh,$fhd);
					fclose($fh);
				}
				
			}else{
				header('location: ../index.php');
			} */
//===============================================================================
update_count($tas["sl_no"], 'percentage3', 0);
update_count($tas["sl_no"], 'percentage2', 0);
//==================================================================================
update_filename($tas["sl_no"], $newcsvfileloc);
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
								//$results = $c2urls->fetch_google_result($gsearch,'2');
								$nval = $i;
								//$results = $c2urls->fetch_google_result_via_proxy_test();
								$results = $c2urls->fetch_google_result_via_proxy($gsearch,'2',$nval);// sends a query with row count of excel file which is $nval;
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
								$fh = fopen($file_loc_upload_custom, 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(3);
									$fh = fopen($file_loc_upload_custom, 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								
								$handle = fopen($file_loc_upload_custom_2, 'r') or die("Failed to read file"); 
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
								$fh = fopen($file_loc_upload_custom, 'w') or die("Failed to read file"); 
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
								
							//$gssr = $gss->google_custom_result("",$rowtestcom);
							$gssr = $gss->google_custom_result_proxy("",$rowtestcom,$nval);
							
							//============================debug_bug
							
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
								$fh = fopen($file_loc_upload_custom, 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(2);
									$fh = fopen($file_loc_upload_custom, 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								$handle = fopen($file_loc_upload_custom_2, 'r') or die("Failed to read file"); 
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
								$fh = fopen($file_loc_upload_custom, 'w') or die("Failed to read file"); 
								$txt2 = "0";
								fwrite($fh, $txt2);
								fclose($fh);
								sleep(2);
							}
							//$testresult = $gss->process_google_for_val($gssr,$company_name);
							
							$testresult = $gss->process_google_for_val_proxy($gssr,$company_name);
							
							$ctr2 = 1;
							foreach($testresult as $results){
								/* echo $results;
								echo "</br>"; */
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
													savefile($newcsvfileloc, $forxlsxdata[0]);// newly added
												}else{
												$forxlsxdata[$array_count_to_inc] = array($rowtestcom,$rowtest,$proresults[0],$proresults[1],$epr,'Success');
												 savefile($newcsvfileloc, $forxlsxdata[$array_count_to_inc]);// newly added
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
											savefile($newcsvfileloc, $forxlsxdata[$array_count_to_inc]);// newly added
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
											savefile($newcsvfileloc, $forxlsxdata[$array_count_to_inc]);// newly added
											break;
										}
					}
					sleep(1);
			update_count($tas["sl_no"],'email_gathering', $nval);
			//update Percentage
			$final_count2 = $final_count - 1;
			$per = ($nval / $final_count2)*100;
			update_count($tas["sl_no"],'percentage1', $per);   
			
		}
		update_filename($tas["sl_no"], $newcsvfilelocM);
		//=====================================================================================Mail Validation=====
		if(count($forxlsxdata)){
		$kmc = 0;
		$filecnt = 1;
		$trip = "2";
		$urlctr = 0;
		$urlcurrent = "";
		$urlold = "";
		$ftype = "COS";
		$final_countml = count($forxlsxdata);
			foreach($forxlsxdata as $forxlsxda){
				$rowtest = $forxlsxda[4];// test and change this in office
				$urlcurrent = explode('@',$rowtest);
						if($urlcurrent[1] == $urlold){
							$urlctr++;
						}else{
							$urlctr = 0;
							$urlold = $urlcurrent[1];
							$trip = "2";
						}
						
				$valstatraw = mainvalidationemail($rowtest,$urlctr);
								if($valstatraw){
									$valstat = "Success";
								}else if($urlcurrent[1] == $urlold && $trip == "4"){
									$valstat = "Failed";
								}else{
									$valstat = "Moderate";
								}
								//process vall
								
								//========================
								
								if($kmc == 0 && $ftype == "COS"){
									$forxlsxdataM[$kmc] = array('Company','Url','Name','Designation', 'Email', 'Result');
									savefile($newcsvfilelocM, $forxlsxdataM[$kmc]);// newly added
								}else if($kmc == 0 && $ftype == "BUL"){
									$forxlsxdataM[$kmc] = array('Url','Email','Result');
									savefile($newcsvfilelocM, $forxlsxdataM[$kmc]);// newly added
								}else if($kmc != 0 && $ftype == "BUL"){
									$forxlsxdataM[$kmc] = array($forxlsxda[0], $rowtest, $valstat);
									savefile($newcsvfilelocM, $forxlsxdataM[$kmc]);// newly added
								}else if($kmc != 0 && $ftype == "COS"){
									$forxlsxdataM[$kmc] = array($forxlsxda[0], $forxlsxda[1], $forxlsxda[2], $forxlsxda[3], $rowtest, $valstat);
									savefile($newcsvfilelocM, $forxlsxdataM[$kmc]);// newly added
								}else{
									echo "Error: Unexpected Condition!";
									die;
								}
								$kmc++;
								update_count($tas["sl_no"],'mailvalidation', $filecnt);
								
			//update Percentage
			$final_count2 = $final_countml - 1;
			$per = ($filecnt / $final_count2)*100;
			update_count($tas["sl_no"],'percentage2', $per); 
$filecnt++;			
			}
		}else{
			$forxlsxdataM[0] = array('Company','Url','Name','Designation', 'Email', 'Result');
			savefile($newcsvfilelocM, $forxlsxdataM[0]);// newly added
		}
		update_filename($tas["sl_no"], $Output_File_LocM);
//======================================Mail Filteration============================================

//==================================================================================================
		$sts = false;
		$stsctrf = 0;
		$stsctrt = 0;
		$stsctrm = 0;
		$datafile = array("Company|Url|FirstName|LastName|Designation|Email|Result");
		$databuffer = array();
		$succ = array();
		$fail = array();
		$mdrt = array();
		$strtmpf = null;
		$strtmpt = null;
		$ctrmgt = 0;
		$final_countft = count($forxlsxdataM);
//=================================================================================================
//for($i=0;$i<$rowcounter;$i++){
$filecnt2 = 0;
if($final_countft){	
	foreach($forxlsxdataM as $forxlsxM){
			//$rowcount = $final[$i];
			$rowtestc = $forxlsxM[0];
			$rowtestu = $forxlsxM[1];
			$rowtestn = $forxlsxM[2];
			$rowtestd = $forxlsxM[3];
			$rowteste = $forxlsxM[4];
			$rowtestr = $forxlsxM[5];
					if(!stristr($rowtestn, 'name') && !stristr($rowtestr, 'result')){
						sleep(0);
						//============================================================================
						
						 if(!$sts){
							 $stn = $rowtestn;
							 $sts = true;
								if($rowtestr == "Failed"){
									 $namearray = explode(' ',$rowtestn);
									 $strtmpf = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
									 array_push($fail, $strtmpf);
									 $stsctrf++;
								}else if($rowtestr == "Success"){
									$namearray = explode(' ',$rowtestn);
									$strtmpt = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
									 array_push($succ, $strtmpt);  
									 $stsctrt++;
								}else{
									$namearray = explode(' ',$rowtestn);
									$strtmpm = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
									 array_push($mdrt, $strtmpm);  
									 $stsctrm++;
									 
								}
						 }else{
							 if($rowtestn == $stn){
								 if($rowtestr == "Failed"){
									 $namearray = explode(' ',$rowtestn);
									 $strtmpf = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
									 array_push($fail, $strtmpf);
									 $stsctrf++;
								}else if($rowtestr == "Success"){
									$namearray = explode(' ',$rowtestn);
									 $strtmpt = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
									 array_push($succ, $strtmpt);  
									 $stsctrt++;
								}else{
									$namearray = explode(' ',$rowtestn);
									$strtmpm = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
									 array_push($mdrt, $strtmpm);  
									 $stsctrm++;
								}
							 }else{
								 if($stsctrt > 0 && $stsctrt < 3 && $stsctrf > 0){
									$databuffer = array_slice($succ, 0, 2);			//get only one failure and other success perfect condition
								 }else if($stsctrt > 0 && $stsctrt < 3 && $stsctrm > 0){
									$databuffer = array_slice($succ, 0, 2);				//Perfect Condition 
								 }else if($stsctrt > 3){
									 $databuffer = array_slice($succ, 0, 1);
									    $databuffertmp =  explode('|',$databuffer[0]);
										$databuffer[0] = $databuffertmp[0].'|'.$databuffertmp[1].'|'.$databuffertmp[2].'|'.$databuffertmp[3].'|'.$databuffertmp[4].'|'.$databuffertmp[5].'|Success Catch All';
										//=================Route through Db============================================
										// $personname = $databuffertmp[2]." ".$databuffertmp[3];
										// $data = get_emails($url,$ctrmgt,$personname);
										// print_r($data);
										// $ctrmgt++;
										// die;
										//==============================================================================
								 }else if($stsctrf > 3){
									 $ctrmgt++;
									 $databuffer = array_slice($fail, 0, 1);
									  //print_r($databuffer);
									 $databuffertmp =  explode('|',$databuffer[0]);
										$databuffer[0] = $databuffertmp[0].'|'.$databuffertmp[1].'|'.$databuffertmp[2].'|'.$databuffertmp[3].'|'.$databuffertmp[4].'|'.$databuffertmp[5].'|Failed Catch All';
										//=================Route through Db============================================
										// $personname = $databuffertmp[2]." ".$databuffertmp[3];
										// $data = get_emails($databuffertmp[1],$ctrmgt,$personname);
										// print_r($data);
										// die;
										
										//==================================================================================
								 }else if($stsctrm > 3){
									 $ctrmgt++;
									 $databuffer = array_slice($mdrt, 0, 1);
										$databuffertmp =  explode('|',$databuffer[0]);
										$databuffer[0] = $databuffertmp[0].'|'.$databuffertmp[1].'|'.$databuffertmp[2].'|'.$databuffertmp[3].'|'.$databuffertmp[4].'|'.$databuffertmp[5].'|Moderate Catch All';	//=================Route through Db============================================
										// $personname = $databuffertmp[2]." ".$databuffertmp[3];
										// $data = get_emails($databuffertmp[1],$ctrmgt,$personname);
										// print_r($data);
										// $ctrmgt++;
										// die;
										
										//==================================================================================							 
								 }
								array_push($datafile, $databuffer[0]);  
										$stsctrf = 0;
										$stsctrt = 0;
										$stsctrm = 0;
										$databuffer = array();
										$succ = array();
										$fail = array();
										$mdrt = array();
										$stn = $rowtestn;
										 $sts = true;
										if($rowtestr == "Failed"){
											$namearray = explode(' ',$rowtestn);
												 $strtmpf = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
												 array_push($fail, $strtmpf);
												 $stsctrf++; 
											}else if($rowtestr == "Success"){
												$namearray = explode(' ',$rowtestn);
												$strtmpt = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
												 array_push($succ, $strtmpt);  
												 $stsctrt++;
											}else{
												$namearray = explode(' ',$rowtestn);
												$strtmpm = $rowtestc.'|'.$rowtestu.'|'.$namearray[0].'|'.$namearray[1].'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
												 array_push($mdrt, $strtmpm);  
												 $stsctrm++;
												 
											}
													
										
							 }
							 
						 }
						
					}else{
						
					}
						
			update_count($tas["sl_no"],'output_fileloc', $filecnt2);
								
			//update Percentage
			$final_count2 = $final_countft - 1;
			$per = ($filecnt2 / $final_count2)*100;
			update_count($tas["sl_no"],'percentage3', $per); 
$filecnt2++;			
		}
}	
		//========================================================================================
			$kmc2 = 0;
				foreach ($datafile as $data){
						$data2 = explode('|',$data);
					    $forxlsxdataF[$kmc2] = $data2;
						savefile($newcsvfilelocF, $forxlsxdataF[$kmc2]);
						$kmc2++;
				}
//print_r($forxlsxdataF);die;
//================================================================================================
		if (!file_exists($Output_File_LocF)) {
			foreach($forxlsxdataF as $row){
			$writer->writeSheetRow('Sheet1', $row);
			}		
		} else {
			$msg = "Excel File Exist, Download CSV File";
			update_error_msg($tas["sl_no"], $msg, 2);
			
		}
$writer->writeToFile($Output_File_LocF);
echo "Saved To File";
//===Store Success in Database======================================
update_success_msg($tas["sl_no"], "Data Saved Successfully", 1);
update_filename($tas["sl_no"], $Output_File_LocF);
//===============================================
	}else{
		$namest = false;
		$msg = "Excel File without Url Cannot Be Used. Please Upload a new File";
		update_error_msg($tas["sl_no"], $msg, 2);
		//update error msg;
	}
}
//============*****ENDOFCUSTOM***********************************
				}else{
					// update database with error report of invalid file type
					$msg = "Empty Excel File";
					update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
				}
				//=============customsearch Search Process============
//******************************************************************************************************************************************************				
			}
		}
		
	}
	sleep(10);
}


//=================================================================

?>
