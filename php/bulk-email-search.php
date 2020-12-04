<?php
include_once '../classes/class.c2url.php';
include_once '../classes/class.verifyEmail.php';
//include_once '../db/config.php';

if(isset($_GET['curl'])){
    $url = $_GET['curl']; 
    $c2urls = new companytourl();
    $urlp = $c2urls->get_domain($url);
    $ar = "";
    $gsearch = 'EMAILS'.' '. '"@'.$urlp.'"';
    $bysearch = '[@'.$urlp.']';
    $yandex = '"@'.$urlp.'"';
    $results = $c2urls->fetch_google_result($gsearch,'2');
	if(stristr($results,"302 Moved")){ // Google Capatcha Solving
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
									@$dom->loadHTML($gssr);
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
									$fh = fopen($file_loc_2, 'r') or die("Failed to read file"); 
									$fhr = fgets($fh);
									fclose($fh);
								}
								$handle = fopen($file_loc, 'r') or die("Failed to read file"); 
								if($handle){
									while (!feof($handle)) {
									$gssrcap = fgets($handle, 4096);
									$buffer .= $gssrcap;
									// Process buffer here..
									}
								}
								//echo "dONE";
								$results = $buffer;
								$fh = fopen($file_loc_2, 'w') or die("Failed to read file"); 
								$txt2 = "0";
								fwrite($fh, $txt2);
								fclose($fh);
								sleep(1);
								}
    $ar .= strip_tags($results);
    $resultsb = $c2urls->fetch_bing_result($bysearch);
    $ar .= strip_tags($resultsb);
    //$resultsd = $c2urls->fetch_yandex_result($yandex);
    //$ar .= strip_tags($resultsd);
    $emails = $c2urls->extract_emails_from($ar,$urlp);
   $emails_array = explode("</br>",$emails);
   
   $ar_cnt = count($emails_array);
   $ar_cnt = $ar_cnt - 1;
   $ctr = 1;
    echo "<div class=\"row\">\n"; 
echo "            <div class=\"col-md-12\">\n"; 
echo "              <div class=\"card\">\n"; 
echo "<form>\n";
echo "                <div class=\"card-header card-header-primary\">\n"; 
echo "                  <h4 class=\"card-title \">Domain Name: $url</h4>\n"; 
echo "                </div>\n"; 
echo "                <div class=\"card-body\">\n"; 
echo "                  <div class=\"table-responsive\">\n"; 
echo "                    <table class=\"table\">\n"; 
echo "                      <thead class=\" text-primary\">\n"; 
echo "                        <tr><th>\n"; 
echo "                          ID\n"; 
echo "                        </th>\n"; 
echo "                        <th>\n"; 
echo "                          Url\n"; 
echo "                        </th>\n";  
echo "                      </tr></thead>\n"; 
echo "                      <tbody>\n"; 

   for($i=0;$i<$ar_cnt;$i++){
		echo "                        <tr>\n"; 
echo "                          <td>\n"; 
echo "                            $ctr\n"; 
echo "                          </td>\n"; 
echo "                          <td><input type=\"hidden\" id=\"sl$ctr\" name=\"sl$ctr\" value=\"$emails_array[$i]\">$emails_array[$i]\n"; 
//echo "                            <a </a>\n"; 
echo "                          </td>\n"; 
echo "                          \n"; 
echo "                        </tr>\n"; 
$ctr++;

   }
 echo "<input type=\"hidden\" id=\"tval\" name=\"tval\" value=\"$ctr\">\n";
echo "                      </tbody>\n"; 
echo "                    </table>\n"; 
echo "                  </div>\n"; 
echo "                </div>\n"; 
echo "              </div>\n"; 
echo "            </div>\n"; 
echo "            \n"; 

echo "</form>\n"; 
echo "<div class=\"card-footer\">\n"; 
echo "<button type=\"submit2\" class=\"btn btn-primary pull-center\" onclick=\"SaveBulkEmails()\">Save Data</button>\n"; 
echo "</div>\n"; 
echo "</div>\n";
}else {
}
?>