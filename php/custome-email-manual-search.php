<?php
include("../classes/class.customsearch.php");
include("../classes/class.validatemail.php");
$table_name = "campaign";
$resultdata = "";
//include('../db/config.php');
//ob_implicit_flush(true);
//ob_start();
$content1 = "";
$content2 = "";
$content3 = "";
$content1 .= "<div class=\"row\">\n";
$content1 .= "            <div class=\"col-md-12\">\n";
$content1 .= "              <div class=\"card\">\n";
$content1 .= "                <div class=\"card-header card-header-primary\">\n";
$content1 .= "                  <h4 class=\"card-title \">Customised Search Result</h4>\n";
$content1 .= "                </div>\n";
$content1 .= "                <div class=\"card-body\">\n";
$content1 .= "                  <div class=\"table-responsive\">\n";
$content1 .= "                    <table class=\"table\">\n";
$content1 .= "                      <thead class=\" text-primary\">\n";
$content1 .= "                        <tr>\n";
$content1 .= "                        <form>\n";
$content1 .= "						<th>ID</th>\n";
$content1 .= "                        <th>Name: </th>\n";
$content1 .= "                        <th>Designation: </th>\n";
$content1 .= "                        <th>Company: </th>\n";
$content1 .= "                        <th>E-MAIL: </th>\n";
$content1 .= "                        <th>Status: </th>\n";
$content1 .= "                      </tr>\n";
$content1 .= "					  </thead>\n";
$content1 .= ""; 
$content2 = "";
$content3 .= "</tbody>\n";
$content3 .= "                    </table>\n";
$content3 .= "                  </div>\n";
$content3 .= "                </div>\n";
$content3 .= "              </div>\n";
$content3 .= "            </div>\n";
$content3 .="</form>";
$content3 .= "<div class=\"card-footer\">\n"; 
//$content3 .= "<button type=\"submit2\" class=\"btn btn-primary pull-center\" onclick=\"Save_Custom_search()\">Save Data</button>\n"; 
$content3 .=  "                  <h4 class=\"\">$resultdata</h4>\n";;
$content3 .= "</div>\n"; 
$content3 .= " </div>\n";
$match = array("CEO","President","Owner","CMO","Chief Marketing Officer","VP of Marketing","VP Marketing","Digital Marketing Manager","Event Coordinator","Event manager","Product marketing manager","Director brand marketing","Director of brand marketing","Digital marketing specialist","Director email marketing","Director of email marketing","Demand generation manager","Campaign manager","Marketing Database Manager","Director Marketing","Director web marketing","Director of web marketing","Affiliate marketing manager","Channel marketing director","Digital media director","VP Business Development","Business Development Director","Global Sales","VP of Sales","VP Sales","Director of Sales","Director Sales","Regional Sales Manager","Head of Sales","Sales Engineer","Business Development Manager","Sales Manager","Chief Sales Officer","Marketing Manager");
//===================================Mail Validataion Function =============================================
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

 if(isset($_GET['compname'])){
	$company_name = $_GET['compname'];
	$company_url = $_GET['compurl'];
	//==================================================bulk search to find Topology====================
	//$c2urls = new companytourl();
	//$urlp = $c2urls->get_domain($company_url);
    //$ar = "";
    //$gsearch = 'EMAILS'.' '. '"@'.$urlp.'"';
    //$bysearch = '[@'.$urlp.']';
    //$yandex = '"@'.$urlp.'"';
    //$results = $c2urls->fetch_google_result($gsearch,'2');
    //$ar .= strip_tags($results);
    //$resultsb = $c2urls->fetch_bing_result($bysearch);
    //$ar .= strip_tags($resultsb);
    ////$resultsd = $c2urls->fetch_yandex_result($yandex);
    ////$ar .= strip_tags($resultsd);
    //$emails = $c2urls->extract_emails_from($ar,$urlp);
    ////echo $emails;
	//$patern_check_array = explode("</br>",$emails);
	//$patern_check_array_count = count($patern_check_array)- 1;
	//if($patern_check_array_count >= 2){
		//$emailsres = $c2urls->process_email_topology($patern_check_array[0],$patern_check_array[1],$patern_check_array[2]);
		////echo $emailsres;
	//}else{
		//$emailsres = 0;
	//}
	//==================================================
	//==================================================bulk search to find Topology====================
								$c2urls = new companytourl();
								$urlp = $c2urls->get_domain($company_url);
								$ar = "";
								$gsearch = 'EMAILS'.' '. '"@'.$urlp.'"';
								$bysearch = '[@'.$urlp.']';
								$yandex = '"@'.$urlp.'"';
								$results = $c2urls->fetch_google_result($gsearch,'2');
							//results = $c2urls->fetch_google_result_via_proxy($gsearch,'2','2');
								if(stristr($results,"302 Moved")){ // Google Capatcha Solving
									$dom = new DOMDocument(1.0);
									@$dom->loadHTML($results);
								   foreach ($dom->getElementsByTagName('a') as $node) {
								   $caplink = $node->getAttribute('href');
								   }
								   echo "^*".$caplink."^*";
									for($z=0;$z<40000;$z++) echo " " ;
									flush();
									sleep(2);
								   $buffer = "";
								$fh = fopen($file_loc, 'r') or die("Failed to read file"); 
								$fhr = fgets($fh);
								fclose($fh);
								while($fhr != 1){
									sleep(3);
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
									fclose($handle);
								}
								//echo "dONE";
								$results = $buffer;
								$fh = fopen($file_loc, 'w') or die("Failed to read file"); 
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
	
	
	//===================================================
	$gss = new custom_search();
    $gssr = $gss->google_custom_result("",$company_name);
	 //$gssr = $gss->google_custom_result_proxy("",$company_name,9);
	
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
	 
		echo "^*".$caplink;
		for($m=0;$m<40000;$m++) echo ' ';
		flush();
		
		
	 //for($z=0;$z<40000;$z++) echo ' ';
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
		$gssr = $buffer;
		
    }
    $testresult = $gss->process_google_for_val($gssr,$company_name);
    $ctr2 = 1;
	
    foreach($testresult as $results){
        //echo $results;
        //echo "</br>";
        //echo "</br>"
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
                $eps = $gss->emailpremuator_pattern($testresult2[0],"","",$company_url,$emailsres);
            }else if($bfepc == 2){
                $eps = $gss->emailpremuator_pattern($testresult2[0],"",$testresult2[1],$company_url,$emailsres);
            }else if($bfepc == 3){
                $eps = $gss->emailpremuator_pattern($testresult2[0],$testresult2[1],$testresult2[2],$company_url,$emailsres);
            }
			$ctr = 1;
			$ctr3 = 0;
			if(isset($_SESSION['optin_user_file']) && $_SESSION['optin_user_file'] != "NO DATA"){
				 $file_name = $_SESSION['optin_user_file'];
				 echo "Last Campagin Name Selected";
			}else{
					echo "You Do not Have any campagin. Please Create One";
					die;
			}
			$file_loc = "../optin_db_folder/".$user_name."/custom-".$file_name;
			if (!(file_exists("../optin_db_folder/".$user_name))) {
				mkdir('../optin_db_folder/'.$user_name, 0777, true);
			}
			$line = array('Name','Designation','Company','email','Status');
            foreach($eps as $epr){//implement mail validation tool here
					
					 sleep(2);
					if(mainvalidationemail($epr,$ctr)){
						$content2 .= "<tr>\n";
						$content2 .="                          <td>$ctr2</td>\n";
						$content2 .="							<td id=en$ctr2>$proresults[0]</td>\n";
						$content2 .="							<td id=ed$ctr2>$proresults[1]</td>\n";
						$content2 .="							<td id=ecn$ctr2>$proresults[2]</td>\n";
						$content2 .="							<td>$epr</td>\n";
						$content2 .="							<td>Success</td>\n";
						$content2 .="                        </tr>\n"; 
						//===================================================================Save Data =======================================
								if ((file_exists($file_loc))) {
									$fh = fopen($file_loc, 'a');
										$linedyn = array($proresults[0],$proresults[1],$proresults[2],$epr,"Success");
										fputcsv($fh, $linedyn, ',');
										fclose($fh);
										$resultdata = "Data Saved Successfully";
									}else{
											$fh = fopen($file_loc, 'a+');
											fputcsv($fh, $line, ',');
													$linedyn = array($proresults[0],$proresults[1],$proresults[2],$epr,"Success");
													fputcsv($fh, $linedyn, ',');
											fclose($fh);
											$resultdata = "File Created and Data Saved Successfully";
									}
						
						//===========================================================================
					}else{
						if($trip == "4"){
							break;
						}
					}
					$ctr3++;
					$ctr++;
					$ctr2 = $ctr2 + 1;
            } 
			if($trip == "4"){
				$trip = "2";
				foreach($eps as $epr){
					$content2 .= "<tr>\n";
						$content2 .="                          <td>$ctr2</td>\n";
						$content2 .="							<td id=en$ctr2>$proresults[0]</td>\n";
						$content2 .="							<td id=ed$ctr2>$proresults[1]</td>\n";
						$content2 .="							<td id=ecn$ctr2>$proresults[2]</td>\n";
						$content2 .="							<td>$epr</td>\n";
						$content2 .="							<td>Failed</td>\n";
						$content2 .="                        </tr>\n"; 
						//===================================================================Save Data =======================================
						if ((file_exists($file_loc))) {
									$fh = fopen($file_loc, 'a');
										$linedyn = array($proresults[0],$proresults[1],$proresults[2],$epr,"Failed");
										fputcsv($fh, $linedyn, ',');
										fclose($fh);
										$resultdata = "Data Saved Successfully";
									}else{
											$fh = fopen($file_loc, 'a+');
											fputcsv($fh, $line, ',');
													$linedyn = array($proresults[0],$proresults[1],$proresults[2],$epr,"Failed");
													fputcsv($fh, $linedyn, ',');
											fclose($fh);
											$resultdata = "File Created and Data Saved Successfully";
									}
						
						//===========================================================================
				}
				echo "</br>";
				echo $resultdata;
			} 
        }else {

        }
    }
			echo $content1;
			echo $content2;
			echo $content3;
 }
?>
