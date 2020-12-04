<?php
date_default_timezone_set('UTC');
require('../classes/xlsxreader.php');
require('../classes/xlsxwriter.php');
//include('../db/config.php');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
$table_name = "campaign";
// function to put data to csv
function savefile($fname, $val){
$fp = fopen($fname, 'a');
fputcsv($fp, $val);
fclose($fp);
}
// newly added
if($_FILES['file']['name'] != ''){
	 //=====================================================================
			session_start();
			$temp_user = $_SESSION["optin_user"];
			$user_name = str_ireplace("optin_","",$temp_user);
			if(isset($_SESSION['optin_user'])){
				 //$file_name_buff = $_SESSION['optin_user_file'];
				 //$file_name_array = explode(".", $file_name_buff);
				 $file_name_sub = "mailfltr-";
				 $file_name_sub .= rand();
				$file_name_sub .= ".xlsx";
				 $file_name = $file_name_sub;
				 echo $file_name."Created";
			}else{
						echo "You Do not Have any campagin. Please Create One";
						die;
			}
//===============================================newly added Create File ===================================
	
			$file_loc = "../optin_db_folder/".$file_name;
			if (!file_exists('../optin_db_folder/'.$user_name)) {
				mkdir('../optin_db_folder/', 0777, true);
			}
			//=========================
    move_uploaded_file($_FILES['file']['tmp_name'], $file_loc);
	//===============================================Start Storing Excel File ==================
		
$location = "../optin_db_folder/";
$location2 = "../optin_db_folder/";
$main_file_name = $location."resp-".$file_name;
$main_file_name_2 = $location2.$file_name;
$main_file_name_3 = "./optin_db_folder/resp-".$file_name;
$plain_file_name = $file_name;
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
	$rowcounter =  count($final);
	$rowcount = $final[0];
	foreach($rowcount as $rowcnt){
		if(stristr($rowcnt, 'company')){
			$namest = true;
			$urlfcountc = $urlcnt;
			
		}else if(stristr($rowcnt, 'url')){
			$namest = true;
			$urlfcountu = $urlcnt;
			
		}else if(stristr($rowcnt, 'name')){
			$namest = true;
			$urlfcountn = $urlcnt;
			
		}else if(stristr($rowcnt, 'designation')){
			$namest = true;
			$urlfcountd = $urlcnt;
			
		}else if(stristr($rowcnt, 'email')){
			$namest = true;
			$urlfcounte = $urlcnt;
			
		}else if(stristr($rowcnt, 'result')){
			$namest = true;
			$urlfcountr = $urlcnt;
			
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
			}else{
				header('location: ../index.php');
			}
		
		$sts = false;
		$datafile = array("Company|Url|Name|Designation|Email|Result");
		//==========================================================================================
		for($i=0;$i<$rowcounter;$i++){
			$rowcount = $final[$i];
			$rowtestc = $rowcount[$urlfcountc];
			$rowtestu = $rowcount[$urlfcountu];
			$rowtestn = $rowcount[$urlfcountn];
			$rowtestd = $rowcount[$urlfcountd];
			$rowteste = $rowcount[$urlfcounte];
			$rowtestr = $rowcount[$urlfcountr];
					if(!stristr($rowtestn, 'name') && !stristr($rowtestr, 'result')){
						sleep(0);
						//============================================================================
						if($rowtestr ==  "Failed"){
							 if(!$sts){ // if first Time
								 $stn = $rowtestn;
								 $sts = true;
								 $strtmp = $rowtestc.'|'.$rowtestu.'|'.$rowtestn.'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
								//=======Create array File;
								array_push($datafile, $strtmp);
								//echo $rowtestr;
								//=================================================
							 }else{ // check if same name second time
								 if(!$stn == $rowtestn){
								 $stn = $rowtestn;
								 $sts = true;
								 $strtmp = $rowtestc.'|'.$rowtestu.'|'.$rowtestn.'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
								 //=======Create array File;
									array_push($datafile, $strtmp);
									//echo $rowtestr;
								//=================================================
								 }
							 }
							 
						}else{
							$strtmp = $rowtestc.'|'.$rowtestu.'|'.$rowtestn.'|'.$rowtestd.'|'.$rowteste.'|'.$rowtestr;
							array_push($datafile, $strtmp);
							//echo $rowtestr;
						}
						//===========================================================Filtering Data===
								$kmc = 0;
								
								//foreach ($datafile as $data){
								//	explode('|',$data);
									//$forxlsxdata[$kmc] = $data;
									//savefile($newcsvfileloc, $forxlsxdata[$kmc]);
								//	$kmc++;
								//}
					
					// store it into excel ================================================
							
					}else{
						echo "I am Here";
					}
						
			
		}
		$kmc++;
		$kmc2 = 0;
		foreach ($datafile as $data){
						$data2 = explode('|',$data);
						$forxlsxdata[$kmc2] = $data2;
						//savefile($newcsvfileloc, $forxlsxdata[$kmc]);
						$kmc2++;
				}
		//print_r($datafile);
		if (!file_exists($main_file_name)) {
		foreach($forxlsxdata as $row){
		$writer->writeSheetRow('Sheet1', $row);
		}		
} else {
    echo "The file $main_file_name exist";
	
}
$writer->writeToFile($main_file_name);
echo "Saved To File";
echo "</br>";
echo '<a href="'.$main_file_name_3.'" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Download Link</a>';
//$link = "<script>window.open('./download.php?file=resp-'".$file_name.")</script>";
//$link2 = "./download.php?file=resp-'".$file_name;
//echo $link;
//header('location: ../optinmailer/');
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

?>