<?php
include_once '../classes/class.c2url.php';
include_once '../classes/class.s2email.php';

if(isset($_GET['comname'])){
	$ctr = 1;
    $company = $_GET['comname']; 
    $country = $_GET['conname'];
    $search = "website + " .$company. "+ " .$country;
    $c2urls = new companytourl();
    $links = $c2urls->fetch_google_result($search,'1'); // 1 for company2URL Search and 2 For 100 Listing Seach
	
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
    $caparray = $c2urls->process_google_results($links,$company); 
	if(empty($caparray)){
		echo "Empty Response From Google. Please Contact It Team";// Could Be Because Google Capatcha
		die;
	}
	 echo "<div class=\"row\">\n"; 
echo "            <div class=\"col-md-12\">\n"; 
echo "              <div class=\"card\">\n"; 
echo "<form>";
echo "                <div class=\"card-header card-header-primary\">\n"; 
echo "                  <h4 class=\"card-title \">Company Name: $company</h4>\n"; 
echo "                  <p class=\"card-category\">Country : $country</p>\n"; 
echo "<input type=\"hidden\" id=\"compid\" name=\"compid\" value=\"$company\">\n";
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
echo "                        <th>\n"; 
echo "                          Select\n"; 
echo "                        </th>\n"; 
echo "                      </tr></thead>\n"; 
echo "                      <tbody>\n"; 
      foreach ($caparray as $caparra){
          //echo $caparra;
          //echo "</br>";
          //echo "</br>";
      
echo "                        <tr>\n"; 
echo "                          <td>\n"; 
echo "                            $ctr\n"; 
echo "                          </td>\n"; 
echo "                          <td>\n"; 
echo "                            <a id=sl$ctr target=\"_blank\"href=\"$caparra\"value=\"$caparra\" >$caparra</a>\n"; 
echo "                          </td>\n"; 
echo "                            <td><input class=\"form-group\" id=c$ctr name=\"\" type=\"checkbox\" value=\"\"></td>\n"; 
echo "                          \n"; 
echo "                        </tr>\n"; 
$ctr++;

        }
		
    }else {
	echo "No Inputs Recived";

    }
echo "                      </tbody>\n"; 
echo "                    </table>\n"; 
echo "                  </div>\n"; 
echo "                </div>\n"; 
echo "              </div>\n"; 
echo "            </div>\n"; 
echo "            \n"; 

echo "</form>\n"; 
echo "<div class=\"card-footer\">\n"; 
echo "<button type=\"submit2\" class=\"btn btn-primary pull-center\" onclick=\"SaveCompanyurl()\">Save Data</button>\n"; 
echo "</div>\n"; 
echo "</div>\n";
?>