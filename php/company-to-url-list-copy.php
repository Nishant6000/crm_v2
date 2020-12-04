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