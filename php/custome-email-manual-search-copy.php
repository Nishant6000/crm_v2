<?php
include("../classes/class.customsearch.php");
include("../classes/class.validatemail.php");
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
$content3 .= "<button type=\"submit2\" class=\"btn btn-primary pull-center\" onclick=\"Save_Custom_search()\">Save Data</button>\n"; 
$content3 .= "</div>\n"; 
$content3 .= " </div>\n";
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



 if(isset($_GET['compname'])){
	$company_name = $_GET['compname'];
	$company_url = $_GET['compurl'];
	//==================================================bulk search to find Topology====================
	$c2urls = new companytourl();
	$urlp = $c2urls->get_domain($company_url);
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
    $gssr = $gss->google_custom_result("",$company_name);
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
		for($z=0;$z<40000;$z++) echo " " ;
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
		}
		//echo "dONE";
		$gssr = $buffer;
		
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
                $eps = $gss->emailpremuator_pattern($testresult2[0],"","",$company_url,$emailsres);
            }else if($bfepc == 2){
                $eps = $gss->emailpremuator_pattern($testresult2[0],"",$testresult2[1],$company_url,$emailsres);
            }else if($bfepc == 3){
                $eps = $gss->emailpremuator_pattern($testresult2[0],$testresult2[1],$testresult2[2],$company_url,$emailsres);
            }
			$ctr = 1;
			
            foreach($eps as $epr){
				$content2 .= "<tr>\n";
				$content2 .="                          <td>$ctr2</td>\n";
				$content2 .="							<td id=en$ctr2>$proresults[0]</td>\n";
				$content2 .="							<td id=ed$ctr2>$proresults[1]</td>\n";
				$content2 .="							<td id=ecn$ctr2>$proresults[2]</td>\n";
				$content2 .="							<td>$epr</td>\n";
				$content2 .="							<td></td>\n";
				$content2 .="                        </tr>\n"; 
				
				$ctr++;
				$ctr2 = $ctr2 + 1;
            } 
			
        }else {
            echo "invalid";
			echo "</br>";

        }
    }
			echo $content1;
			echo $content2;
			echo $content3;
 }
?>
