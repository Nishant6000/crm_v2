<?php

 session_start();
$temp_user = $_SESSION["optin_user"];
$user_name = str_ireplace("optin_","",$temp_user);
$fileloc2 = "C:\\xampp\\htdocs\\crm\\crm_main\\test\\".$user_name."-all-user.txt";  
$fh = fopen($fileloc2, 'r') or die("Failed to read file"); 
$fhr = fgets($fh);
fclose($fh);
echo $fhr;
for($z=0;$z<40000;$z++) echo ' ';
flush();
sleep(2);
while(1){
$fh = fopen($fileloc2, 'r') or die("Failed to read file"); 
$fhr = fgets($fh);
fclose($fh);
echo $fhr;
for($z=0;$z<40000;$z++) echo ' ';
flush();
sleep(2);	
}
?>