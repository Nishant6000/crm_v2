<?php

date_default_timezone_set('UTC');
require('../classes/xlsxreader.php');
require('../classes/xlsxwriter.php');
require("../classes/class.validatemail.php");
//include('../db/config.php');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
$table_name = "campaign";
global $trip;
$trip = "2";
$urlctr = 0;
$urlcurrent = "";
$urlold = "";
function savefile($fname, $val){
		$fp = fopen($fname, 'a');
		fputcsv($fp, $val);
		fclose($fp);
		}
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
if($_FILES['file']['name'] != ''){
	 //=====================================================================
			session_start();
			$temp_user = $_SESSION["optin_user"];
			$user_name = str_ireplace("optin_","",$temp_user);
			if(isset($_SESSION['optin_user_file']) && $_SESSION['optin_user_file'] != "NO DATA"){
				 $file_name_buff = $_SESSION['optin_user_file'];
				 $file_name_array = explode(".", $file_name_buff);
				 $file_name_sub = "mailval-";
				 $file_name_sub .= $file_name_array[0];
				 $file_name_sub .= ".xlsx";
				 $file_name = $file_name_sub;
				 echo $file_name."Created";
			}else{	
				echo "You Do not Have any campagin. Please Create One";
				die;
			}
				
			$file_loc = "../optin_db_folder/".$user_name."/".$file_name;
			if (!file_exists('../optin_db_folder/'.$user_name)) {
				mkdir('../optin_db_folder/'.$user_name, 0777, true);
			}
			//=========================
    move_uploaded_file($_FILES['file']['tmp_name'], $file_loc);
	//============================================================================================Start Storing Excel File ==================
	
$newcsvfile = "csvmailval-".$file_name_buff;
$newcsvfileloc = "../optin_db_folder/".$user_name."/".$newcsvfile;
if (!file_exists($newcsvfileloc)) {
		$fh = fopen($newcsvfileloc, 'w');
}	
$location = "../optin_db_folder/".$user_name."/";
$main_file_name = $location."resp-".$file_name;
$main_file_name_2 = $location.$file_name;
if(!file_exists($main_file_name_2)){
	echo "File Does not Exists";
	die;
}
if(file_exists($main_file_name)){
	echo "</br>";
	echo "File Exists cannot Proceed Further. Please Create a New Campagin";
	die;
}
echo "File 	Uploaded, Processing The File,Please Wait......";
for($c=0;$c<40000;$c++)echo " ";
flush();
$xlsx = new XLSXReader($location.$file_name); // Use Session to Get file name
$sheetNames = $xlsx->getSheetNames();
$namest = false;
$urlcnt = 0;
$urlfcount = 0;
$filenametocreatexlsxdata = $location."response-".$file_name;
$forxlsxdata = array();
$writer = new XLSXWriter();
$writer->setAuthor('Optin Prospects'); 
$kmc = 0;
$ftype = "";
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
		echo "Sorry Unsupported File Format";
		die;
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
		session_start();
			if(isset($_SESSION['optin_user'])){
			}else{
				header('location: ../index.php');
			}
		
		
		//==========================================================================================
		for($i=0;$i<$rowcounter;$i++){
			$rowcount = $final[$i];
			$rowtest = $rowcount[$urlfcount];
					if(!stristr($rowtest, 'Email') && $rowtest != ""){
						sleep(4);
						
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
									echo "Error: Unexpected Condition!";
									die;
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
							echo "Error: Unexpected Condition! Loc2";
							die;
						}
						$kmc++;
					}
			echo "^*& Process Status: <b>".$i."</b> Out Of <b>".$rowcounter."</b> Is Complete ^*&";
			for($z=0;$z<40000;$z++) echo ' ';
			flush();
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
			
		}else{
		unlink($main_file_name_2);
		// delete particular code
	}
}
}

}else{
	echo "No File Selected";

}

?>