<?php
//$link = "<script>window.open('../optin_db_folder/')</script>";
//echo $link;
if(!empty($_GET['f'])){
    $fileName = $_GET['f'];
	$fileName2 = urldecode(str_ireplace('./optin_db_folder_v2','',$fileName));
	echo $fileName2;die;
    $filePath = 'optin_db_folder_v2/'.$fileName2;
    if(!empty($fileName) && file_exists($filePath)){
		echo "Your Download will start Now...";
        // Define headers
        //header("Cache-Control: public");
        //header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
}