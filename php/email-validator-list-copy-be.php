<?php
include("../classes/class.validatemail.php");
//include("classes/class.validatemailmain.php");
$content1 = "";
$content2 = "";
$content3 = "";
$content1 .= "<div class=\"row\">\n";
$content1 .= "            <div class=\"col-md-12\">\n";
$content1 .= "              <div class=\"card\">\n";
$content1 .= "                <div class=\"card-header card-header-primary\">\n";
$content1 .= "                  <h4 class=\"card-title \">Email Validation Results</h4>\n";
$content1 .= "                </div>\n";
$content1 .= "                <div class=\"card-body\">\n";
$content1 .= "                  <div class=\"table-responsive\">\n";
$content1 .= "                    <table class=\"table\">\n";
$content1 .= "                      <thead class=\" text-primary\">\n";
$content1 .= "                        <tr>\n";
$content1 .= "                        <form>\n";
$content1 .= "						<th>ID</th>\n";
$content1 .= "                        <th>E-Mail</th>\n";
$content1 .= "                        <th>Status</th>\n";
$content1 .= "                        <th>Select</th>\n";
$content1 .= "                      </tr>\n";
$content1 .= "					  </thead>\n";
$content1 .= ""; 
$content2 = "";
$content2a ="";
$content3 .= "</tbody>\n";
$content3 .= "                    </table>\n";
$content3 .= "                  </div>\n";
$content3 .= "                </div>\n";
$content3 .= "              </div>\n";
$content3 .= "            </div>\n";
$content3 .="</form>";
$content3 .= "<div class=\"card-footer\">\n"; 
$content3 .= "<button type=\"submit2\" class=\"btn btn-primary pull-center\" onclick=\"SaveValEmail()\">Save Data</button>\n"; 
$content3 .= "</div>\n"; 
$content3 .= " </div>\n";
if(isset($_GET['email'])){
        $eid = $_GET['email']; 
        $vemail = new validateEmail();
		$vemail->setEmailFrom("info@lexusenergy.com");
		if($vemail->check($eid)){
			if($vemail->checkmx($eid)){
				$oserv = $vemail->smtpval($eid);
				if($oserv == "21" || $oserv == "22" || $oserv == "23"){
							$content2 .= "<tr>\n";
							$content2 .="                          <td>1</td>\n";
							$content2 .="							<td id=el1 value=$eid>$eid</td>\n";
							$content2 .="							<td>False Set By Our Server.</td>\n";
							$content2 .="							<td></td>\n";
							$content2 .="                        </tr>\n"; 
					$mailtestdata = $vemail->mailtester($eid);
						if ($mailtestdata == ""){
							$content2a .= "<tr>\n";
							$content2a .="                          <td>2</td>\n";
							$content2a .="							<td id=ml1 value=$eid>$eid</td>\n";
							$content2a .="							<td>No Response From Mail Tester</td>\n";
							$content2a .="							<td></td>\n";
							$content2a .="                        </tr>\n"; 
						}else if($mailtestdata == "Good" || $mailtestdata == "Excellent"){
							$content2a .= "<tr>\n";
							$content2a .="                          <td>2</td>\n";
							$content2a .="							<td id=ml1 value=$eid>$eid</td>\n";
							$content2a .="							<td>Success</td>\n";
							$content2a .="							<td><input class=\"form-group\" id=mc1 name=\"\" type=\"checkbox\" value=$eid></td>\n";
							$content2a .="                        </tr>\n"; 
						}else if($mailtestdata == "Bad"){
							$content2a .= "<tr>\n";
							$content2a .="                          <td>2</td>\n";
							$content2a .="							<td id=ml1 value=$eid>$eid</td>\n";
							$content2a .="							<td>Bad response From Mail tester</td>\n";
							$content2a .="							<td></td>\n";
							$content2a .="                        </tr>\n"; 
						}else if($mailtestdata == "Bad2" && $no > "2"){
							$content2a .= "<tr>\n";
							$content2a .="                          <td>2</td>\n";
							$content2a .="							<td id=ml1 value=$eid>$eid</td>\n";
							$content2a .="							<td>Bad response From Mail tester</td>\n";
							$content2a .="							<td></td>\n";
							$content2a .="                        </tr>\n"; 
						}else if($mailtestdata == "Unknown" && $no > "2"){
							$content2a .= "<tr>\n";
							$content2a .="                          <td>2</td>\n";
							$content2a .="							<td id=ml1 value=$eid>$eid</td>\n";
							$content2a .="							<td>Vefification For Mail Blocked</td>\n";
							$content2a .="							<td></td>\n";
							$content2a .="                        </tr>\n"; 
						}else{
							$content2a .= "<tr>\n";
							$content2a .="                          <td>2</td>\n";
							$content2a .="							<td id=ml1 value=$eid>$eid</td>\n";
							$content2a .="							<td>Vefification For Mail Blocked</td>\n";
							$content2a .="							<td></td>\n";
							$content2a .="                        </tr>\n"; 
						}
				}else if($oserv == "20"){
					$content2 .= "<tr>\n";
							$content2 .="                          <td>1</td>\n";
							$content2 .="							<td id=el1 value=$eid>$eid</td>\n";
							$content2 .="							<td>Success</td>\n";
							$content2 .="							<td><input class=\"form-group\" id=c1 name=\"\" type=\"checkbox\" value=$eid></td>\n";
							$content2 .="                        </tr>\n"; 
                }else{
                    $content2 .= "<tr>\n";
							$content2 .="                          <td>1</td>\n";
							$content2 .="							<td id=el1 value=$eid>$eid</td>\n";
							$content2 .="							<td>False Set By Our Server.</td>\n";
							$content2 .="							<td></td>\n";
							$content2 .="                        </tr>\n"; 
                }
			}else{
							$content2 .= "<tr>\n";
							$content2 .="                          <td>1</td>\n";
							$content2 .="							<td id=el1 value=$eid>$eid</td>\n";
							$content2 .="							<td>Mx record Error.</td>\n";
							$content2 .="							<td></td>\n";
							$content2 .="                        </tr>\n"; 
			}
		}else{
							$content2 .= "<tr>\n";
							$content2 .="                          <td>1</td>\n";
							$content2 .="							<td id=el1 value=$eid\>$eid</td>\n";
							$content2 .="							<td>Invalid Email Id.</td>\n";
							$content2 .="							<td></td>\n";
							$content2 .="                        </tr>\n"; 
		}
	
}

echo $content1;       
echo $content2;
echo $content2a;
echo $content3;

?>