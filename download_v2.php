<?php
session_start(); 
if (isset($_SESSION["optin_user"])){
$temp = $_SESSION["optin_user"];
$user_name = str_ireplace("optin_","",$temp); //user name	
//$link = "<script>window.open('../optin_db_folder/')</script>";
//echo $link;
if(!empty($_GET['f'])){
   $fileName = basename($_GET['f']);
	$fileName2 = str_ireplace('./optin_db_folder_v2','',$fileName);
	$fileName2 = str_ireplace('%20',' ',$fileName2);
    $filePath = "./optin_db_folder_v2/".$user_name."/".$fileName2;
    if(!empty($fileName) && file_exists($filePath)){
		echo "Your Download will start Now...";
        // Define headers
        //header("Cache-Control: public");
        //header("Content-Description: File Transfer");
        /* header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application");
        header("Content-Transfer-Encoding: binary"); */
	header('Content-Description: File Transfer');
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=\"".basename($filePath)."\"");
    header("Content-Transfer-Encoding: binary");
    header("Expires: 0");
    header("Pragma: public");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header('Content-Length: ' . filesize($filePath)); //Remove

    ob_clean();
    flush();

    readfile($filePath);
        // Read the file
		//ECHO $filePath;
        //readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
}
}else{
	echo "You Do not have permission to download";
}