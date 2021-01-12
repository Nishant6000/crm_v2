
<?php 
include("./db_v2/config.php");
require('../classes_v2/xlsxreader.php');
require('../classes_v2/class.customsearch.php');
require('../classes_v2/xlsxwriter.php');
date_default_timezone_set('America/Chicago');
$date = date('Y-m-d');
$username =  "nishanth_optin";
$mail_type = "text";
//========================Get ALL Pending Task===============================
//while(1){
	$task = get_all_pending_Task($username);
	if($task){
		foreach ($task as $tas){
			if($tas["typeofsearch"] == "BULK"){// check if type of search
				$filename = $tas["fileloc"];
				$filename = str_ireplace('../','./',$filename);
				$xlsx = new XLSXReader($filename);
				$sheetNames = $xlsx->getSheetNames();
				$sheet = $xlsx->getSheet($sheetNames[1]);
				$final = $sheet->getData();
				$final_count = count($final);
				//========count if data exists else close the activity====
				if($final_count){
//========*******STARTOFBULKSEARCH******************************************************
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
//===================Crea===============================================
$filearray = explode('/',$filename);
$Output_File_Name = "abemail-".$tas["campaign_name"]."-".rand(1,100)."-".$filearray[3];
$Output_File_Loc = $filearray[0]."/optin_db_folder_v2/".$filearray[2]."/".$Output_File_Name;
$Newcsvfile = "csvabemail-".rand(1,100)."-".$file_name_buff;
$Newcsvfileloc = "../optin_db_folder_v2/".$user_name."/".$Newcsvfile;
if (!file_exists($Newcsvfileloc)) {
	$fh = fopen($Newcsvfileloc, 'w');
}
$file_loc = "../optin_db_folder_v2/".$username."/".$Output_File_Name;
if (!file_exists('../optin_db_folder_v2/'.$username)) {
	mkdir('../optin_db_folder_v2/'.$username, 0777, true);
}
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



//========================END================================================



//*********************Temp Zone*****************************

if($_FILES['file']['name'] != ''){
	
echo "File 	Uploaded, Processing The File,Please Wait......";
for($c=0;$c<40000;$c++)echo " ";
flush();
$xlsx = new XLSXReader($location.$file_name); // Use Session to Get file name
$sheetNames = $xlsx->getSheetNames();
$namest = false;
$urlcnt = 0;
$urlfcount = 0;
$filenametocreatexlsxdata = $location."response".$file_name;
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
		///===========================================================================================
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
				
			}else{
				header('location: ../index.php');
			}
		
		
		//==========================================================================================
		for($i=0;$i<$rowcounter;$i++){
			$rowcount = $final[$i];
			$rowtest = $rowcount[$urlfcount];
					if(!stristr($rowtest, 'url') && $rowtest != ""){
						sleep(2);
						$fh = fopen("stat.txt", 'a') or die("Failed to read file"); 
						fwrite($fh, $rowtest);
						fclose($fh);
						
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
					
					// store it into excel ================================================
							
					}else{
						
					}
			
		}
		if (!file_exists($main_file_name)) {
		foreach($forxlsxdata as $row){
		$writer->writeSheetRow('Sheet1', $row);
		}		
} else {
    echo "The file $main_file_name exist";
	
}
$writer->writeToFile($main_file_name);
echo "Saved To File";
			//foreach($forxlsxdata as $test){
				//print_r($test) ;
				//echo "</br>";
			//}
	}else{
		$namest = false;
		echo "Excel File without Url Cannot Be Used. Please Upload a new File";
		if (file_exists($main_file_name)) {
			unlink($main_file_name_2);
		}else{
		
		// delete particular code
	}
}
}

}else{
	echo "No File Selected";

}

//============*****ENDOFBULK***********************************
				}else{
					// update database with error report of invalid file type
					$msg = "Empty Excel File"
					update_error_msg($tas["sl_no"], $msg, 2);// stored error msg and stopped
				}
				//=============Bulk Search Process============
			}else if($tas["typeofsearch"] == "MAILVAL"){
				$filename = $tas["fileloc"];
			}else if($tas["typeofsearch"] == "CTOURL"){
				$filename = $tas["fileloc"];
			}else if($tas["typeofsearch"] == "CUSTOM"){
				$filename = $tas["fileloc"];
			}
		}
		die;
	}
//}


//=================================================================

?>
