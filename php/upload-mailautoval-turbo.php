
  <?php

date_default_timezone_set('UTC');
require('../classes/xlsxreader.php');
require('../classes/xlsxwriter.php');
require('../classes/class.customsearch.php');
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
/*function get_emails($url,$rownum,$personname){
		$c2urls = new companytourl();
		$urlp = $c2urls->get_domain($url);
		$ar = "";
		$gsearch = $personname.' '. '"@'.$urlp.'"';
		$results = $c2urls->fetch_google_result_via_proxy($gsearch,'2',$rownum);
		print_r($results);die;
		if($results){
			$ar .= strip_tags($results);
			$emails = $c2urls->extract_emails_from($ar,$urlp);
			$email_array = explode("</br>",$emails);
			$patern_check_array_count = count($email_array);
			$result[0] = $patern_check_array_count;
			$result[1] = $email_array;
			return $result;
		}else{
			return False;
		}
		
		
	
}*/
// newly added
if($_FILES['file']['name'] != ''){
	 //=====================================================================
	session_start();
			$temp_user = $_SESSION["optin_user"];
			$user_name = str_ireplace("optin_","",$temp_user);
			if(isset($_SESSION['optin_user_file'])){
				 $file_name_buff = $_SESSION['optin_user_file'];
				 $file_name_array = explode(".", $file_name_buff);
				 $file_name_sub = "valturbomail-".rand()."-";
				 $file_name_sub .= $file_name_array[0];
				$file_name_sub .= ".xlsx";
				 $file_name = $file_name_sub;
				 echo $file_name."Created";
			}else{
						echo "You Do not Have any campagin. Please Create One";
						die;
			}
//===============================================newly added Create File ===================================
$newcsvfile = "csvvalturbomail-".$file_name_buff;
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
$location2 = "./optin_db_folder/".$user_name."/";
$main_file_name = $location."resp-".$file_name;
$main_file_name_2 = $location.$file_name;
$main_file_name_3 = $location2."resp-".$file_name;
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


//===================same as old code;
			
$kmc = 0;
if(count($sheetNames) == 0 || count($sheetNames) == ""){
	echo "Empty File Cannot Proceed";
}else{
	$sheetNames = $xlsx->getSheetNames();
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
						
			
		}
		
		$kmc++;
		$kmc2 = 0;
		
				foreach ($datafile as $data){
						$data2 = explode('|',$data);
					    $forxlsxdata[$kmc2] = $data2;
						savefile($newcsvfileloc, $forxlsxdata[$kmc]);
						$kmc2++;
				}
				//print_r($forxlsxdata);
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