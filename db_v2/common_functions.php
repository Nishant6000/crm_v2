<?php

function checkLogin($table_name_2, $user_name, $date){
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name_2 . " WHERE username = '$user_name' AND date = '$date' ORDER BY sl_no DESC";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if(count($results) > 0) {
       return true;
    }else{
		return false;
	}
}
//===========================================================================
function storeLogin($table_name_2, $user_name, $date, $time){
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
	$sql = "INSERT INTO " . $table_name_2 . " (username, date, login, log_out) VALUES ('$user_name','$date','$time','')";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
//=========================================================================
function getAuth($table_name, $username, $password){
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE username = '" . $username . "' AND password = '". base64_encode($password) ."' AND status = 1 ORDER BY sl_no DESC";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       return $results[0];
    }else{
		return false;
	}
    
	
}
//===========================================================================================
function errorMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}
//=================================================================================================

function select_distinct_campaign($user){
$sql = "SELECT DISTINCT campaign_name FROM campaign WHERE username='$user'" ;	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
//======================================================================================================
function  add_camp_task($campaign,$username,$fileloc,$typeofs) {
    global $DB;
    $rs = array();
	date_default_timezone_set('Asia/Kolkata');
	$datetime = date('Y-m-d h:i:s', time());
	$sql = "INSERT INTO campaign (campaign_name, username, fileloc, fileuploaded_time, typeofsearch) VALUES ('$campaign','$username','$fileloc','$datetime','$typeofs')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}
//======================================================================================================
function select_all_camp($user){
$sql = "SELECT * FROM campaign WHERE username='$user' ORDER BY sl_no DESC" ;	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
//======================================================================================================
function Select_All_Completed_Task($user_name){
	$sql = "SELECT * FROM campaign WHERE username='$user_name' AND status='1' ORDER BY sl_no DESC" ;	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function Select_All_Pending_Task($user_name){
	$sql = "SELECT * FROM campaign WHERE username='$user_name' AND status='0'ORDER BY sl_no DESC" ;	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function delete_slno($sl){
	 global $DB;
    $rs = array();
	$sql = "DELETE FROM campaign WHERE sl_no = '$sl'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
return true;
}
function get_all_pending_Task($username){
	$sql = "SELECT * FROM campaign WHERE username = '$username' AND status = '0'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function update_error_msg($sl_no, $msg, $status){
	global $DB;
    $rs = array();
	$sql = "UPDATE campaign SET error_msg='$msg', status='$status' WHERE sl_no='$sl_no'";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function update_success_msg($sl_no, $msg, $status){
	date_default_timezone_set('Asia/Kolkata');
	$date = date('Y-m-d h:i:s');
	global $DB;
    $rs = array();
	$sql = "UPDATE campaign SET error_msg='$msg', status='1',filecompletedate='$date' WHERE sl_no='$sl_no'";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function update_filename($sl_no, $filename){
	$date = date('Y-m-d h:i:s');
	global $DB;
    $rs = array();
	$sql = "UPDATE campaign SET tmpcsvfileloc='$filename' WHERE sl_no='$sl_no'";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function update_count($sl_no, $watup, $count){
	$date = date('Y-m-d h:i:s');
	global $DB;
    $rs = array();
	$sql = "UPDATE campaign SET $watup='$count' WHERE sl_no='$sl_no'";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function get_proxy_info($proxyname,$proxyno) {
      $sql = "SELECT * FROM proxy WHERE name = '$proxyname' AND server_no = '$proxyno'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function get_cap_stat($proxyname){
	 $sql = "SELECT * FROM captcha WHERE name = '$proxyname'";
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function write_current_status($datafileproxy, $txt2){
	 global $DB;
	$mix = $comments."|".$user_name;
    $rs = array();
	$sql = "UPDATE proxy SET Serverinfo ='$txt2' WHERE server_no='$datafileproxy'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function write_capatcha($proxyname, $txt2){
	global $DB;
    $rs = array();
	$sql = "UPDATE captcha SET capdata ='$txt2' WHERE name='$proxyname'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
?>