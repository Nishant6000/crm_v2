<?php
//include("../classes/class.validatemail.php");
//include("classes/class.validatemailmain.php");
include("../classes/class.customsearch.php");
if(isset($_GET['fname'])){
	$fname = $_GET['fname'];
	$mname = $_GET['mname'];
	$lname = $_GET['lname'];
	$curl = $_GET['curl'];
$ep = new custom_search;
if($mname==""){
$stat = $fname." ".$lname;
}else{
$stat = $fname." ".$mname." ".$lname;	
}
$domain = $curl;
$bfep = $ep->bfr_email_permuator($stat);
if($bfep){
    $bfepc = count($bfep);
    if($bfepc == 1){
        $eps = $ep->emailpremuator($bfep[0],"","",$domain);
    }else if($bfepc == 2){
        $eps = $ep->emailpremuator($bfep[0],"",$bfep[1],$domain);
    }else if($bfepc == 3){
        $eps = $ep->emailpremuator($bfep[0],$bfep[1],$bfep[2],$domain);
    }
}else {
    echo "invalid";
}
echo "<div class=\"row\">\n"; 
echo "            <div class=\"col-md-12\">\n"; 
echo "              <div class=\"card\">\n"; 
echo "                <div class=\"card-header card-header-primary\">\n"; 
echo "                  <h4 class=\"card-title \">Email Permuator List</h4>\n"; 
echo "                </div>\n"; 
echo "<form>\n";
echo "                <div class=\"card-body\">\n"; 
echo "                  <div class=\"table-responsive\">\n"; 
echo "                    <table class=\"table\">\n"; 
echo "                      <thead class=\" text-primary\">\n"; 
echo "                        <tr>\n"; 
echo "						<th>ID</th>\n"; 
echo "                        <th>E-Mail</th>\n"; 
echo "                        <th><input class=\"form-group\" id=main name=\"\" type=\"checkbox\" onchange=\"checkall()\" value=\"\"> Select all</th>\n"; 
echo "                      </tr>\n"; 
echo "					  </thead>\n"; 
echo "                      <tbody>\n";
//$eps = $ep->emailpremuator("kenny","john","Thompson","https://www.basyspro.com");
$ctr = 1;
foreach($eps as $epr){
    echo "<tr>\n"; 
echo "                          <td>$ctr</td>\n"; 
echo "							<td>$epr</td>\n"; 
echo "							<td><input class=\"form-group\" id=ch$ctr name=\"\" type=\"checkbox\" value=\"$epr\"></td>\n"; 
echo "                        </tr>\n";
$ctr++;
}
echo "<input type=\"hidden\" id=\"tval\" name=\"tval\" value=\"$ctr\">\n";
echo " </tbody>\n"; 

echo "                    </table>\n"; 
echo "                  </div>\n"; 
echo "                </div>\n"; 
echo "              </div>\n"; 
echo "            </div>\n"; 
echo "</form>\n"; 
echo "<div class=\"card-footer\">\n"; 
echo "<button type=\"submit2\" class=\"btn btn-primary pull-center\" onclick=\"Saveemailpermuator()\">Save Data</button>\n"; 
echo "</div>\n"; 
echo " </div>          \n";
}
?>