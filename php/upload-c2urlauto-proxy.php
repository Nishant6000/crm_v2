<?php
date_default_timezone_set('UTC');
require('../classes/xlsxreader.php');
require('../classes/xlsxwriter.php');
require('../classes/class.c2url.php');
include('../db/config.php');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
$table_name = "campaign";

if($_FILES['file']['name'] != ''){
	 //=====================================================================
			session_start();
			$temp_user = $_SESSION["optin_user"];
			$user_name = str_ireplace("optin_","",$temp_user);
			if(isset($_SESSION['optin_user_file'])){
				 $file_name_buff = $_SESSION['optin_user_file'];
				 $file_name_array = explode(".", $file_name_buff);
				   $file_name_sub = "ac2url-";
				 $file_name_sub .= $file_name_array[0];
				  $file_name_sub .= ".xlsx";
				 $file_name = $file_name_sub;
			}else{
				$db_results = countdata_campdata_last($table_name, $user_name);
					if($db_results){
						$file_name_buff = $db_results['filename'];
						 $file_name_array = explode(".", $file_name_buff);
						  $file_name_sub = "ac2url-";
						 $file_name_sub .= $file_name_array[0];
						  $file_name_sub .= ".xlsx";
						 $file_name = $file_name_sub;
						$_SESSION['optin_user_file'] = $file_name_buff;
						echo "No Campagin. Last Filename selected";
						
					}else{
						echo "You Do not Have any campagin. Please Create One";
					}
			}
				
			$file_loc = "../optin_db_folder/".$user_name."/".$file_name;
			if (!file_exists('../optin_db_folder/'.$user_name)) {
				mkdir('../optin_db_folder/'.$user_name, 0777, true);
			}
			//=========================
    move_uploaded_file($_FILES['file']['tmp_name'], $file_loc);
	//============================================================================================Start Storing Excel File ==================
	
	
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
		///===========================================================================================
		session_start();
			
			if(isset($_SESSION['optin_user'])){
				
				
			}else{
				header('location: ../index.php');
			}
		
		
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

?>