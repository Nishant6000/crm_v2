<?php
//include("../classes/class.validatemail.php");
//include("classes/class.validatemailmain.php");
require("../mval_v2/email_validation.php");
$validator=new email_validation_class;

	/*
	 * If you are running under Windows or any other platform that does not
	 * have enabled the MX resolution function GetMXRR() , you need to
	 * include code that emulates that function so the class knows which
	 * SMTP server it should connect to verify if the specified address is
	 * valid.
	 */
	if(!function_exists("GetMXRR"))
	{
		/*
		 * If possible specify in this array the address of at least on local
		 * DNS that may be queried from your network.
		 */
		$_NAMESERVERS=array();
		include("../mval/getmxrr.php");
	}
	/*
	 * If GetMXRR function is available but it is not functional, you may
	 * use a replacement function.
	 */
	/*
	else
	{
		$_NAMESERVERS=array();
		if(count($_NAMESERVERS)==0)
			Unset($_NAMESERVERS);
		include("rrcompat.php");
		$validator->getmxrr="_getmxrr";
	}
	*/

	/* how many seconds to wait before each attempt to connect to the
	   destination e-mail server */
	$validator->timeout=10;

	/* how many seconds to wait for data exchanged with the server.
	   set to a non zero value if the data timeout will be different
		 than the connection timeout. */
	$validator->data_timeout=0;

	/* user part of the e-mail address of the sending user
	   (info@phpclasses.org in this example) */
	$validator->localuser="info";

	/* domain part of the e-mail address of the sending user */
	$validator->localhost="phpclasses.org";

	/* Set to 1 if you want to output of the dialog with the
	   destination mail server */
	$validator->debug=0;

	/* Set to 1 if you want the debug output to be formatted to be
	displayed properly in a HTML page. */
	$validator->html_debug=0;


	/* When it is not possible to resolve the e-mail address of
	   destination server (MX record) eventually because the domain is
	   invalid, this class tries to resolve the domain address (A
	   record). If it fails, usually the resolver library assumes that
	   could be because the specified domain is just the subdomain
	   part. So, it appends the local default domain and tries to
	   resolve the resulting domain. It may happen that the local DNS
	   has an * for the A record, so any sub-domain is resolved to some
	   local IP address. This  prevents the class from figuring if the
	   specified e-mail address domain is valid. To avoid this problem,
	   just specify in this variable the local address that the
	   resolver library would return with gethostbyname() function for
	   invalid global domains that would be confused with valid local
	   domains. Here it can be either the domain name or its IP address. */
	$validator->exclude_address="";
	$validator->invalid_email_domains_file = '../mval_v2/invalidemaildomains.csv';
	$validator->invalid_email_servers_file = '../mval_v2/invalidemailservers.csv';
	$validator->email_domains_white_list_file = '../mval_v2/emaildomainswhitelist.csv';

//////////////////////////////////////////////////////////////////////////////////////////////

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
$content1 .= "                        <th>E-Mail</th>\n";
$content1 .= "                        <th>Status</th>\n";
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
$content3 .= " </div>\n";
if(isset($_GET['email'])){
        $email = $_GET['email'];
		if(strlen($error = $validator->ValidateAddress($email, $valid)))
		{
			$content2 .= "<tr>\n";
							$content2 .="							<td id=el1 value=$email><strong>$email</strong></td>\n";
							$content2 .="							<td style='font-weight:bold;color:red;'>Error: ".HtmlSpecialChars($error)."</td>\n";
							$content2 .="                        </tr>\n"; 
		}
		elseif(!$valid)
		{
							$content2 .= "<tr>\n";
							$content2 .="							<td id=el1 value=$email><strong>$email</strong></td>\n";
							$content2 .="							<td style='font-weight:bold;color:red;'>Failed</td>\n";
							$content2 .="                        </tr>\n"; 
		}
		elseif(($result=$validator->ValidateEmailBox($email))<0){
							$content2 .= "<tr>\n";
							$content2 .="							<td id=el1 value=$email><strong>$email</strong></td>\n";
							$content2 .="							<td style='font-weight:bold;color:red;'>Failed</td>\n";
							$content2 .="                        </tr>\n"; 
		}
		else{
			if($result == ''){
							$content2 .= "<tr>\n";
							$content2 .="							<td id=el1 value=$email><strong>$email</strong></td>\n";
							$content2 .="							<td style='font-weight:bold;color:red;'>Failed</td>\n";
							$content2 .="                        </tr>\n"; 
			}else{
							$content2a .="							<td id=ml1 value=$email><strong>$email</strong></td>\n";
							$content2a .="							<td style='font-weight:bold;color:green;'>Success</td>\n";
		
							$content2a .="                        </tr>\n"; 
			}
		
	}
	
		
		/*
       /* $vemail = new validateEmail();
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
		}*/
	
}

echo $content1;       
echo $content2;
echo $content2a;
echo $content3;

?>