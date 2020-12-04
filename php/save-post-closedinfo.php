<?php
include('../db/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require '../PHPMailernew/vendor/autoload.php';
session_start();
$mailbody = 'Please find the contract details below and files as the attachment'."\n\n";
$table_name = "leads_db";
			if (isset($_SESSION["optin_user"])){
					
			}else{
				header('location: ../index.php');
			}
if(isset($_POST['industrytype'])){
	if($_POST['industrytype'] == 'EXPO'){
	$showname = $_POST['showname'];
	$showurl = $_POST['showurl'];
	$showcomm = $_POST['showcomment'];
	$ldata = $_POST['ldata'];
	$ldname = $_POST['ldname'];
	$clname = $_POST['clname'];
	$comname = $_POST['comname'];
	$delemail = $_POST['delemail'];
	$ddate = $_POST['ddate'];
	$camount = $_POST['camount'];
	$property = $_POST['property'];
	$property2 = $_POST['property2'];
				$temp = $_SESSION["optin_user"];
				$date = date('Y-m-d'); // date				
				$user_name = str_ireplace("optin_","",$temp); //user name
				if($_FILES['file']['name'][0] != '' && $_FILES['file']['name'][1] != ''){
   				$file_loc = "../optin_db_folder/".$user_name."/"."closed-lead-".$date."-".$_FILES['file']['name'][0];
				$file_loc2 = "../optin_db_folder/".$user_name."/"."closed-lead-".$date."-".$_FILES['file']['name'][1];
					if (!file_exists('../optin_db_folder/'.$user_name)) {
						mkdir('../optin_db_folder/'.$user_name, 0777, true);
					}
			//=========================
				move_uploaded_file($_FILES['file']['tmp_name'][0], $file_loc);
				move_uploaded_file($_FILES['file']['tmp_name'][1], $file_loc2);
				$closed = 1;
				$closeddata = $_POST['industrytype']."|".$showname."|".$ldname;
				$id = explode('|',$ldata);
				if($id[2] == "4"){
					sales_save_closed_lead_info_mgr($id[0],$id[1],$closed,$camount,$closeddata,$ddate,$file_loc,$file_loc2,$_POST['industrytype'],$showurl,$showcomm);
				}else{
					sales_save_closed_lead_info_mgr($id[0],$id[1],$closed,$camount,$closeddata,$ddate,$file_loc,$file_loc2,$_POST['industrytype'],$showurl,$showcomm);
				}
				$mailbody .=  'Show Name: '.$showname. "\n\n";
				$mailbody .=  'Show Url: '.$showurl. "\n\n";
				$mailbody .=  'Show Comments: '.$showcomm. "\n\n";
				$mailbody .=  'Lead Email: '.$id[0]. "\n\n";
				$mailbody .=  'User Name: '.$id[1]. "\n\n";
				$mailbody .=  'Total Counts: '.$ldname. "\n\n";
				$mailbody .=  'Client Name: '.$clname. "\n\n";
				$mailbody .=  'Company Name: '.$comname. "\n\n";
				$mailbody .=  'Delivery Email: '.$delemail. "\n\n";
				$mailbody .=  'Delivery Due Date: '.$ddate. "\n\n";
				$mailbody .=  'Deal Value: '.$camount." Dollars"."\n\n";
				$mailbody2 = nl2br($mailbody);
				mailsending($file_loc, $file_loc2, $mailbody2);
				echo "File Uploaded And Data Saved Successfully";
				}else{
					echo "Please upload File";
					die;
				}
	}else if($_POST['industrytype'] == 'TECHNOLOGY'){
		$tecname = $_POST['tecname'];
		$tname = $_POST['tname'];
		$tcomm = $_POST['tcomm'];
		$gname = $_POST['gname'];
		$ldata = $_POST['ldata'];
	$ldname = $_POST['ldname'];
	$clname = $_POST['clname'];
	$comname = $_POST['comname'];
	$delemail = $_POST['delemail'];
	$ddate = $_POST['ddate'];
	$camount = $_POST['camount'];
	$property = $_POST['property'];
	$property2 = $_POST['property2'];
		$temp = $_SESSION["optin_user"];
				$date = date('Y-m-d'); // date
				$user_name = str_ireplace("optin_","",$temp); //user name
				if($_FILES['file']['name'][0] != '' && $_FILES['file']['name'][1] != ''){
   				$file_loc = "../optin_db_folder/".$user_name."/"."closed-lead-".$date."-".$_FILES['file']['name'][0];
				$file_loc2 = "../optin_db_folder/".$user_name."/"."closed-lead-".$date."-".$_FILES['file']['name'][1];
					if (!file_exists('../optin_db_folder/'.$user_name)) {
						mkdir('../optin_db_folder/'.$user_name, 0777, true);
					}
			//=========================
				move_uploaded_file($_FILES['file']['tmp_name'][0], $file_loc);
				move_uploaded_file($_FILES['file']['tmp_name'][1], $file_loc2);
				$$closed = 1;
				$closeddata = $_POST['industrytype']."|".$iname."|".$tname."|".$gname."|".$ldname;
				$id = explode('|',$ldata);
				if($id[2] == "4"){
					sales_save_closed_lead_info_mgr($id[0],$id[1],$closed,$camount,$closeddata,$ddate,$file_loc,$file_loc2,$_POST['industrytype'],'',$tcomm);
				}else{
					sales_save_closed_lead_info_mgr($id[0],$id[1],$closed,$camount,$closeddata,$ddate,$file_loc,$file_loc2,$_POST['industrytype'],'',$tcomm);
				}
				$mailbody .=  'Technology  Name: '.$tecname. "\n\n";
				$mailbody .=  'Technology  Titles: '.$tname. "\n\n";
				$mailbody .=  'Technology Comments: '.$tcomm. "\n\n";
				$mailbody .=  'Technology Geography: '.$gname. "\n\n";
				$mailbody .=  'Lead Email: '.$id[0]. "\n\n";
				$mailbody .=  'User Name: '.$id[1]. "\n\n";
				$mailbody .=  'Total Counts: '.$ldname. "\n\n";
				$mailbody .=  'Client Name: '.$clname. "\n\n";
				$mailbody .=  'Company Name: '.$comname. "\n\n";
				$mailbody .=  'Delivery Email: '.$delemail. "\n\n";
				$mailbody .=  'Delivery Due Date: '.$ddate. "\n\n";
				$mailbody .=  'Deal Value: '.$camount." Dollars"."\n\n";
				$mailbody2 = nl2br($mailbody);
				mailsending($file_loc, $file_loc2, $mailbody2);
				echo "File Uploaded And Data Saved Successfully";
				
				}else{
					echo "Please upload File";
					die;
				}
	}else if($_POST['industrytype'] == 'INDUSTRY'){
		$tecname = $_POST['iname'];
		$tname = $_POST['tname'];
		$icomm = $_POST['icomm'];
		$gname = $_POST['gname'];
		$ldata = $_POST['ldata'];
		$ldname = $_POST['ldname'];
		$clname = $_POST['clname'];
		$comname = $_POST['comname'];
		$delemail = $_POST['delemail'];
		$ddate = $_POST['ddate'];
		$camount = $_POST['camount'];
		$property = $_POST['property'];
		$property2 = $_POST['property2'];
		$temp = $_SESSION["optin_user"];
				$date = date('Y-m-d'); // date
				$user_name = str_ireplace("optin_","",$temp); //user name
				if($_FILES['file']['name'][0] != '' && $_FILES['file']['name'][1] != ''){
   				$file_loc = "../optin_db_folder/".$user_name."/"."closed-lead-".$date."-".$_FILES['file']['name'][0];
				$file_loc2 = "../optin_db_folder/".$user_name."/"."closed-lead-".$date."-".$_FILES['file']['name'][1];
					if (!file_exists('../optin_db_folder/'.$user_name)) {
						mkdir('../optin_db_folder/'.$user_name, 0777, true);
					}
			//=========================
				move_uploaded_file($_FILES['file']['tmp_name'][0], $file_loc);
				move_uploaded_file($_FILES['file']['tmp_name'][1], $file_loc2);
				$closed = 1;
				$closeddata = $_POST['industrytype']."|".$tecname."|".$tname."|".$gname."|".$ldname;
				$id = explode('|',$ldata);
				if($id[2] == "4"){
					sales_save_closed_lead_info_mgr($id[0],$id[1],$closed,$camount,$closeddata,$ddate,$_FILES['file']['name'][0],$_FILES['file']['name'][1],$_POST['industrytype'],'',$icomm);
				}else{
					sales_save_closed_lead_info_mgr($id[0],$id[1],$closed,$camount,$closeddata,$ddate,$_FILES['file']['name'][0],$_FILES['file']['name'][1],$_POST['industrytype'],'',$icomm);
				}
				$mailbody .=  'industry Name: '.$tecname. "\n\n";
				$mailbody .=  'industry Titles: '.$tname. "\n\n";
				$mailbody .=  'industry Comments: '.$icomm. "\n\n";
				$mailbody .=  'industry Geography: '.$gname. "\n\n";
				$mailbody .=  'Lead Email: '.$id[0]. "\n\n";
				$mailbody .=  'User Name: '.$id[1]. "\n\n";
				$mailbody .=  'Total Counts: '.$ldname. "\n\n";
				$mailbody .=  'Client Name: '.$clname. "\n\n";
				$mailbody .=  'Company Name: '.$comname. "\n\n";
				$mailbody .=  'Delivery Email: '.$delemail. "\n\n";
				$mailbody .=  'Delivery Due Date: '.$ddate. "\n\n";
				$mailbody .=  'Deal Value: '.$camount." Dollars"."\n\n";
				$mailbody2 = nl2br($mailbody);
				mailsending($file_loc, $file_loc2, $mailbody2);
				echo "File Uploaded And Data Saved Successfully";
				}else{
					echo "Please upload File";
					die;
				}
	}else{
		echo "Please Make Neccessary correction and try again";
	}
	
}else{
	echo "No Data Recived";
}
function mailsending($attach1, $attach2, $body){
	//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_OFF;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'nishant6000@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'intel500mhz@';

//Set who the message is to be sent from
$mail->setFrom('nishant6000@gmail.com', 'Nishant S');


//Set who the message is to be sent to
$mail->addAddress('stanley@optinprospects.us', 'Stanley');

//Set the subject line
$mail->Subject = 'Closed lead Deal';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//Replace the plain text body with one created manually
$mail->AltBody = 'Please find the contract details as the attachment';

$mail->IsHTML(true);
$mail->Body= $body;
//Attach an image file
$mail->addAttachment($attach1);
$mail->addAttachment($attach2);

//send the message, check for errors
	if (!$mail->send()) {
		echo 'Mailer Error: '. $mail->ErrorInfo;
	} else {
		echo 'Message sent!';
	}
}

	
   
			

?>