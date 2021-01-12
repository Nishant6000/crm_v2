
<?php
global $temp;
session_start();
include("./db_v2/config.php");
if (isset($_GET["id"])){
	$id = $_GET["id"];
	$ret = delete_slno($id);
	if($ret){
		header('location: view_my_files_v2.php');
	}else{
		header('location: index.php');
	}
}else{
	header('location: index.php');
}
?>
