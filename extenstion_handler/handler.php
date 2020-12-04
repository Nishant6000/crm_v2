
<?php

if (isset($_POST["fdata"])) {
	$d = $_POST["fdata"];
	$k = explode("dataoptinuser*^=",$d);
	$myfile = fopen('../test/google.txt', "w") or die("Unable to open file!");
fwrite($myfile, $d);
fclose($myfile);
 //session_start();
//$temp_user = $_SESSION["optin_user"];
//$user_name = str_ireplace("optin_","",$temp_user);
$fileloc1 = "../test/".$k[1]."-all-user-data.txt";
$fileloc2 = "../test/".$k[1]."-all-user.txt";  
$txt = $k[0];
$txt2 = 1;
$myfile = fopen($fileloc1, "w") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
$myfile2 = fopen($fileloc2, "w") or die("Unable to open file!");
fwrite($myfile2, $txt2);
fclose($myfile2);
 
echo "Data Written Successfully";
} else {    
    echo "N0, DaTa Fail";
}
?>