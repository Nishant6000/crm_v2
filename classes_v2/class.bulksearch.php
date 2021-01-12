<?php

/**
 * Class to check up e-mail
 *
 * @author Konstantin Granin <kostya@granin.me>
 * @copyright Copyright (c) 2015, Konstantin Granin
 */
class bulkSearch {
	//==================Buffer Zone =========	
public $bulk_table_name = "campaign";

public function function savefile($fname, $val){
$fp = fopen($fname, 'a');
fputcsv($fp, $val);
fclose($fp);
}

public function getbulkemail($domain){
	
	
}
}

// newly added
if($_FILES['file']['name'] != ''){
	 //=====================================================================
			session_start();
			$temp_user = $_SESSION["optin_user"];
			$user_name = str_ireplace("optin_","",$temp_user);
			if(isset($_SESSION['optin_user_file'])){
				 $file_name_buff = $_SESSION['optin_user_file'];
				 $file_name_array = explode(".", $file_name_buff);
				 $file_name_sub = "abemail-";
				 $file_name_sub .= $file_name_array[0];
				$file_name_sub .= ".xlsx";
				 $file_name = $file_name_sub;
				 echo $file_name."Created";
			}else{
						echo "You Do not Have any campagin. Please Create One";
						die;
			}
//===============================================newly added Create File ===================================
$newcsvfile = "csvabemail-".$file_name_buff;
$newcsvfileloc = "../optin_db_folder/".$user_name."/".$newcsvfile;
if (!file_exists($newcsvfileloc)) {
		$fh = fopen($newcsvfileloc, 'w');
}
//========================================Csv File Created ============================			
			$file_loc = "../optin_db_folder/".$user_name."/".$file_name;
			if (!file_exists('../optin_db_folder/'.$user_name)) {
				mkdir('../optin_db_folder/'.$user_name, 0777, true);
			}
			//=========================
    move_uploaded_file($_FILES['file']['tmp_name'], $file_loc);
	//===============================================Start Storing Excel File ==================
	
	
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
	
	//=========================================
public function errorMessage() {
		//$errorMsg = '<strong>' . $this->getMessage() . "</strong><br />\n";
		$errorMsg = $this->getMessage();
		return $errorMsg;
	}
	


/**
 * verifyEmail exception handler
 */


?>