<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require './vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//$mail->SMTPOptions = array('ssl' => array('verify_peer' => true,'verify_peer_name' => true,'allow_self_signed' => true));
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_CLIENT;
//Set the hostname of the mail server
$mail->Host = 'mail.expokeycontacts.info';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Whether to use SMTP Secure 
$mail->SMTPSecure = '';
//Whether to use SMTP AutoTLS 
$mail->SMTPAutoTLS = true;
//Username to use for SMTP authentication
$mail->Username = 'lillyg@leadsfit-usa.info';
//Password to use for SMTP authentication
$mail->Password = 'optin105';
//Set who the message is to be sent from
$mail->setFrom('lillyg@leadsfit-usa.info', 'Lilly');
//Set an alternative reply-to address
$mail->addReplyTo('lillyg@leadsfit-usa.info', 'Lilly');
//Set who the message is to be sent to
$mail->addAddress('nishant6000@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<p>HI</p>");
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
?>