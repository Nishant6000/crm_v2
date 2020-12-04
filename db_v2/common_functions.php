<?php


function debugResults($var, $strict = false) {
    if ($var != NULL) {
        if ($strict == false) {

            if (is_array($var) || is_object($var)) {
                echo "<pre>";
                print_r($var);
                echo "</pre>";
            } else {
                echo $var;
            }
        } else {

            if (is_array($var) || is_object($var)) {
                echo "<pre>";
                var_dump($var);
                echo "</pre>";
            } else {
                var_dump($var);
            }
        }
    } else {
        var_dump($var);
    }
}

function errorMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #F00;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function successMessage($str) {
    return '<div style="width:50%; margin:0 auto; border:2px solid #06C;padding:2px; color:#000; margin-top:10px; text-align:center;">' . $str . '</div>';
}

function simple_redirect($url) {

    echo "<script language=\"JavaScript\">\n";
    echo "<!-- hide from old browser\n\n";

    echo "window.location = \"" . $url . "\";\n";

    echo "-->\n";
    echo "</script>\n";

    return true;
}

function getHomeURL() {
    return HTTP_SERVER . SITE_DIR;
}

// Return a random value
function db_prepare_input($string) {
    return trim(addslashes($string));
}

//Encryption function
function easy_crypt($string) {
    return base64_encode($string . "_@#!@");
}

//Decodes encryption
function easy_decrypt($str) {
    $str = base64_decode($str);
    return str_replace("_@#!@", "", $str);
}

function getParentCategoryName($id) {
    global $DB;
    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE 1 AND page_id = :id";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
    
   return ($results[0]["page_title"] <> "" ) ? $results[0]["page_title"] : "None";
}

function getPageDetailsByName($pageAlias) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE 1 AND page_alias = :pname";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":pname", $pageAlias);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailTable($table_name, $from, $to) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " LIMIT ". $from .",". $to ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailTableOrdDec($table_name, $from, $to) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " ORDER BY id DESC LIMIT ". $from .",". $to ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailTableOrdTecCat($table_name, $from, $to, $tecspec) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE category = '" . $tecspec . "' ORDER BY id DESC LIMIT ". $from .",". $to ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailTableOrdTecEdDV($table_name, $from, $to, $tecspec) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE edition = '" . $tecspec . "' ORDER BY id ASC LIMIT ". $from .",". $to ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailTableOrdTecSS($table_name, $from, $to, $tecspec) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE edition = '" . $tecspec . "' ORDER BY id DESC LIMIT ". $from .",". $to ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailTableRowCount($table_name) {
    $sql = "SELECT * FROM " . $table_name;	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	return $num_rows = mysqli_num_rows($result);
}
function getPageDetailTableRowCountFeat($table_name, $vol) {
    $sql = "SELECT * FROM " . $table_name . " WHERE edition = '".$vol."' AND category = 'Feature'" ;	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	return $num_rows = mysqli_num_rows($result);
}
function getPageDetailTableRowCountDV($table_name, $vol) {
    $sql = "SELECT * FROM " . $table_name . " WHERE edition = '".$vol."'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	return $num_rows = mysqli_num_rows($result);
}
function getPageDetailTableOrdTecCatCov($table_name, $from, $to, $tecspec, $vol) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE category = '" . $tecspec . "' AND edition = '". $vol ."' ORDER BY id DESC LIMIT ". $from .",". $to ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailTableOrdTecCatFea($table_name, $from, $to, $tecspec, $vol) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE category = '" . $tecspec . "' AND edition = '". $vol ."' ORDER BY id ASC LIMIT ". $from .",". $to ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailTableOrdED($table_name, $from, $to, $vol) {
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE edition = '" . $vol . "' ORDER BY id DESC LIMIT ". $from .",". $to ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function getPageDetailAuth($table_name, $name, $accid) {
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE email = '" . $name . "' AND password = '". $accid ."' AND is_active = 1 ORDER BY id DESC";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  "TRUE";
    }else{
		$rs = "FALSE";
	}
    return $rs;
}

function getPageDetailTableOrdSlinks($table_name, $tecspec) {
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE share_link = '" . $tecspec . "' ORDER BY id ASC " ;
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  $results[0];
    }
    return $rs;
}
function insertPageDetailToTablePR($table_name, $paragraph, $slug, $title, $keyword, $subtitle ,$target_database) {
    global $DB;
    $rs = array();
	$time = date('Y-m-d h-i-s', time());
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO " . $table_name . " (content, slug, title, keywords, description, subtitle, updated, timestamp, image) VALUES ('".$paragraph."','".$slug."','".$title."','".$keyword."','".$subtitle."','".$subtitle."','".$time."','".$time."','".$target_database."')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}
function insertPageDetailToTableEP($table_name, $paragraph, $slug, $title, $keyword, $subtitle ,$target_database) {
    global $DB;
    $rs = array();
	$time = date('Y-m-d h-i-s', time());
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO " . $table_name . " (content, slug, title, keywords, description, subtitle, updated, image) VALUES ('".$paragraph."','".$slug."','".$title."','".$keyword."','".$subtitle."','".$subtitle."','".$time."','".$target_database."')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}
function insertPageDetailToTableIA($table_name, $title, $subtitle, $content, $edition, $target_database, $slug) {
    global $DB;
    $rs = array();
	$time = date('Y-m-d h-i-s', time());
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO " . $table_name . " (title, subtitle, edition, content, timestamp, image, slug) VALUES ('".$title."','".$subtitle."','".$edition."','".$paragraph."','".$time."','".$target_database."','".$slug."')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}
function insertPageDetailToTableEYE($table_name, $paragraph, $slug, $title, $category, $keyword, $subtitle ,$target_database) {
    global $DB;
    $rs = array();
	$time = date('Y-m-d h-i-s', time());
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO " . $table_name . " (content, slug, title, category, keywords, description, subtitle, updated, timestamp, image) VALUES ('".$paragraph."','".$slug."','".$title."','".$category."','".$keyword."','".$subtitle."','".$subtitle."','".$time."','".$time."','".$target_database."')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}
function insertPageDetailToTableWEB($table_name, $title, $keyword, $description, $edition, $category, $paragraph, $target_database, $edition_slug, $subtitle, $category_slug, $slug, $randomString) {/// incomplete
    global $DB;
    $rs = array();
	$time = date('Y-m-d h-i-s', time());
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO " . $table_name . " (title, keywords, description, edition, category, content, image, slug, subtitle, timestamp, cat_slug, title_slug, share_link) VALUES ('".$title."','".$keyword."','".$description."','".$edition."','".$category."','".$paragraph."','".$target_database."','".$edition_slug."','".$subtitle."','".$time."','".$category_slug."','".$slug."','".$randomString."')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}
function insertPageDetailToTableID($table_name, $title, $keyword, $description, $target_database) {
    global $DB;
    $rs = array();
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO " . $table_name . " (title, description, keywords, image) VALUES ('".$title."','".$description."','".$keyword."','".$target_database."')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}
function insertPageDetailToTableMP($table_name, $title, $paragraph, $edition, $target_database, $slug) {
    global $DB;
	$time = date('Y-m-d h-i-s', time());
    $rs = array();
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO " . $table_name . " (title, content, edition, timestamp, image, slug) VALUES ('".$title."','".$paragraph."','".$edition."','".$time."','".$target_database."','".$slug."')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}

//=======================================================================cuvera business solutions pvt ltd========================================

function getPageDetailAuth2($table_name, $name, $accid) {
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE email = '" . $name . "' AND password = '". $accid ."' AND status = 1 ORDER BY sl DESC";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  "TRUE";
    }else{
		$rs = "FALSE";
	}
    return $rs;
}

function getPageDetailemail($table_name, $name) {
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE email = '" . $name . "' AND status = 1 ORDER BY sl DESC";   
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       $rs =  "TRUE";
    }else{
		$rs = "FALSE";
	}
    return $rs;
}
 
	  
	function Passupdate($table_name, $name, $accid) {
    global $DB;
	$time = date('Y-m-d h-i-s', time());
    $rs = array();
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	//$sql = "INSERT INTO " . $table_name . " (title, content, edition, timestamp, image, slug) VALUES ('".$title."','".$paragraph."','".$edition."','".$time."','".$target_database."','".$slug."')";
	$sql = "UPDATE $table_name SET password='$accid' WHERE email='$name'";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}	
	
function insertPageDetailToTableTest($table_name, $paragraph, $title, $keyword, $subtitle ,$target_file_db) {
    global $DB;
    $rs = array();
	$time = date('Y-m-d h-i-s', time());
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO " . $table_name . " (title, keyword, videourl, content, image) VALUES ('".$title."','".$keyword."','".$subtitle."','".$paragraph."','".$target_file_db."')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}
// Optin Prospects ====================================================================================================================
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
//===================================================================Check attendence date =====================
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
//======================Insert into attendence==========================================================================
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
//========================================================================Update Logout===================================
function Logout($table_name, $user_name, $date, $time) {

    global $DB;
	//$time = date('Y-m-d h-i-s', time());
    $rs = array();
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	//$sql = "INSERT INTO " . $table_name . " (title, content, edition, timestamp, image, slug) VALUES ('".$title."','".$paragraph."','".$edition."','".$time."','".$target_database."','".$slug."')";
	$sql = "UPDATE $table_name SET log_out='$time' WHERE username='$user_name' AND date='$date'";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
}	
function checkcamp($table_name, $campnameplain, $file_name_plain, $user_name){
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE campaign_name = '$campnameplain' AND username = '$user_name' ORDER BY sl_no DESC";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       return true;
    }else{
		return false;
	}
	
}
//==============================================================================================================================
function createcamp($table_name, $campnameplain , $folder_name, $file_name_plain, $user_name, $date){
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
	$sql = "INSERT INTO " . $table_name . " (campaign_name, username, filename, foldername, campagin_create_date) VALUES ('$campnameplain','$user_name','$file_name_plain','$folder_name','$date')";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function countdata_camplist($table_name, $user_name){
	 global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE username = '$user_name' ORDER BY sl_no DESC";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       return count($results);
    }else{
		return 0;
	}
	
}
function countdata_campdata_last($table_name, $user_name){
	 global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE username = '$user_name' ORDER BY sl_no DESC";
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
		return 0;
	}
	
}
function sales_view_all_leads_all($table_name) {
    $sql = "SELECT * FROM " . $table_name . " ORDER BY date DESC";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_view_all_leads($table_name, $user_name) {
    $sql = "SELECT * FROM " . $table_name . " WHERE username = '$user_name' ORDER BY date DESC";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_view_all_leads_acco($table_name, $user_name) {
    $sql = "SELECT * FROM " . $table_name . " WHERE routedto = '$user_name' ORDER BY date DESC";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_view_all_notintrested_leads($table_name, $agent_name){
	$sql = "SELECT * FROM " . $table_name . " WHERE username = '$agent_name' AND notintrested = '1' ORDER BY date DESC";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_view_all_notintrested_leads_mgr($table_name, $agent_name){
	$sql = "SELECT * FROM " . $table_name . " WHERE routedto = '$agent_name' AND notintrested = '1' ORDER BY date DESC";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_view_all_leads_details_mgr($table_name, $email, $agent_name) {
    $sql = "SELECT * FROM " . $table_name . " WHERE email = '$email' AND routedto = '$agent_name'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_view_all_leads_details_acco($table_name, $email, $agent_name){
	$sql = "SELECT * FROM " . $table_name . " WHERE email = '$email' AND routedto = '$agent_name'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_view_all_leads_details_man($table_name, $email){
	$sql = "SELECT * FROM " . $table_name . " WHERE email = '$email'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_view_all_leads_details($table_name, $email){
	$sql = "SELECT * FROM " . $table_name . " WHERE email = '$email'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_update_lead_comments($email,$user_name,$comments){
	 global $DB;
	$mix = $comments."|".$user_name;
    $rs = array();
	$sql = "UPDATE leads_db SET comments ='$mix' WHERE email='$email'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_update_route($email,$user_name,$comments){
	 global $DB;
    $rs = array();
	$sql = "UPDATE leads_db SET routed ='1', routedto ='$comments', routedby ='$user_name' WHERE email='$email'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_sample_request_acco($email, $user_name, $data, $followup){
	global $DB;
	date_default_timezone_set('America/Chicago');
	$date = date('Y-m-d');
	//$datep = date_create($date);
	//date_add($datep,date_interval_create_from_date_string("1 days"));
	//$followup = date_format($datep,"Y-m-d");
	//$mix = $comments."|".$user_name;
    $rs = array();
	$sql = "UPDATE leads_db SET samplecriteria ='$data', samplereqdate='$date', followupdate='$followup', actiontaken='1', clientresp='|' WHERE email='$email' AND routedto='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_sample_request($email, $user_name, $data, $followup){
	global $DB;
	date_default_timezone_set('America/Chicago');
	$date = date('Y-m-d');
	//$datep = date_create($date);
	//date_add($datep,date_interval_create_from_date_string("1 days"));
	//$followup = date_format($datep,"Y-m-d");
	//$mix = $comments."|".$user_name;
    $rs = array();
	$sql = "UPDATE leads_db SET samplecriteria ='$data', samplereqdate='$date', followupdate='$followup', actiontaken='1', clientresp='|' WHERE email='$email' AND username='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_save_closed_lead_info($email,$username,$closed,$camount,$closeddata,$ddate,$sampleurl,$contracturl,$industry,$url,$comments){
	global $DB;
	date_default_timezone_set('America/Chicago');
	$date = date('Y-m-d');
    $rs = array();
	$sql = "UPDATE leads_db SET closed ='1', amount='$camount', actiontaken='5', closeddata='$closeddata', deliverydate='$ddate', closedsamplefile='$sampleurl', closedcontractfile='$contracturl', industrytype='$industry', closedurl='$url', closedcomm='$comments' WHERE email='$email' AND username='$username'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_save_closed_lead_info_mgr($email,$username,$closed,$camount,$closeddata,$ddate,$sampleurl,$contracturl,$industry,$url,$comments){
	global $DB;
	date_default_timezone_set('America/Chicago');
	$date = date('Y-m-d');
    $rs = array();
	$sql = "UPDATE leads_db SET closed ='1', amount='$camount', actiontaken='5', closeddata='$closeddata', deliverydate='$ddate', closedsamplefile='$sampleurl', closedcontractfile='$contracturl', industrytype='$industry', closedurl='$url', closedcomm='$comments' WHERE email='$email' AND routedto='$username'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_new_view_all_leads($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE username = '$agent_name' AND actiontaken='0'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_new_view_all_leads_acco($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE routedto = '$agent_name' AND actiontaken='0'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_new_followup_view_all_leads($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE username = '$agent_name' AND followupdate = '$date' AND actiontaken='1'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_new_followup_view_all_leads_mgr($table_name, $agent_name, $user_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE routedto = '$agent_name' AND routedby = '$user_name' AND followupdate = '$date' AND actiontaken='1'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_new_followup_view_all_leads_acco($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE routedto = '$agent_name' AND followupdate = '$date' AND actiontaken='1'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_markclosed_followup($email,$username){
	global $DB;
	date_default_timezone_set('America/Chicago');
	$date = date('Y-m-d');
    $rs = array();
	$sql = "UPDATE leads_db SET delivered='1' WHERE email='$email' AND routedto='$username'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_samp_file_loc($serial,$fileloc){
	global $DB;
	date_default_timezone_set('America/Chicago');
	$date = date('Y-m-d');
    $rs = array();
	$sql = "UPDATE leads_db SET samplefile='$fileloc' WHERE sl_no='$serial'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
} 
function sales_sample_view_all_leads(){
	$sql = "SELECT * FROM leads_db WHERE actiontaken='1' AND samplefile IS NULL";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_sample_request_data($sl){
	$sql = "SELECT * FROM leads_db WHERE sl_no = '$sl'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_hot_leads_followup_view_all_leads($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE username = '$agent_name' AND followupdate = '$date' AND actiontaken='2'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_hot_leads_followup_view_all_leads_acco($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE routedto = '$agent_name' AND followupdate = '$date' AND actiontaken='2'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_hot_leads_followup_view_all_leads_mgr($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE routedto = '$agent_name' AND followupdate = '$date' AND actiontaken='2'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function  sales_closed_leads_followup_view_all_leads($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE username = '$agent_name' AND closed='1'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function  sales_closed_leads_followup_view_all_leads_mgr($table_name, $agent_name, $date){
	$sql = "SELECT * FROM " . $table_name . " WHERE routedto = '$agent_name' AND closed='1'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function sales_add_client_response($email,$user_name,$data){
	global $DB;
    $rs = array();
	$data .= "|";
	$sql = "UPDATE leads_db SET clientresp=concat(clientresp,'$data') WHERE email='$email' AND username='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_add_client_response_mgr($email,$user_name,$data){
	global $DB;
    $rs = array();
	$data .= "|";
	$sql = "UPDATE leads_db SET clientresp=concat(clientresp,'$data') WHERE email='$email' AND routedto='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_add_client_response_nr($email,$user_name,$data){
	global $DB;
    $rs = array();
	$data .= "|";
	$sql = "UPDATE leads_db SET actiontaken='3', clientresp=concat(clientresp,'$data'), notintrested='1' WHERE email='$email' AND username='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_add_client_response_nr_mgr($email,$user_name,$data){
	global $DB;
    $rs = array();
	$data .= "|";
	$sql = "UPDATE leads_db SET actiontaken='3', clientresp=concat(clientresp,'$data'), notintrested='1' WHERE email='$email' AND routedto='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_redsceh_followup($email,$user_name,$data,$fdate){
	global $DB;
    $rs = array();
	$sql = "UPDATE leads_db SET followupdate='$fdate', rschcomments='$data' WHERE email='$email' AND username='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_redsceh_followup_sales($email,$user_name,$data,$fdate){
	global $DB;
    $rs = array();
	$sql = "UPDATE leads_db SET followupdate='$fdate', rschcomments='$data' WHERE email='$email' AND routedto='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_redsceh_followup_mgr($email,$user_name,$data,$fdate){
	global $DB;
    $rs = array();
	$sql = "UPDATE leads_db SET followupdate='$fdate', rschcomments='$data' WHERE email='$email' AND routedto='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_hot_lead_request($email,$user_name,$data){
	global $DB;
	$mix = $comments."|".$user_name;
    $rs = array();
	$sql = "UPDATE leads_db SET actiontaken='2', hcomments='$data' WHERE email='$email' AND routedto='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function sales_hot_lead_request_mgr($email,$user_name,$data){
	global $DB;
	$mix = $comments."|".$user_name;
    $rs = array();
	$sql = "UPDATE leads_db SET actiontaken='2', hcomments='$data' WHERE email='$email' AND routedto='$user_name'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function get_all_agents($user_name){
	$sql = "SELECT * FROM crm_auth WHERE accosiated = '$user_name'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function get_all_sales($user_name){
	$sql = "SELECT * FROM crm_auth WHERE accosiated = '$user_name' AND designation = 'SALES'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function countdata_camplist_data($table_name, $user_name) {
    $sql = "SELECT * FROM " . $table_name . " WHERE username = '$user_name'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function getall_data_daterange($table_name,$username,$fromdate,$currentdate) {
	$sql = "SELECT * FROM " . $table_name . " WHERE date BETWEEN '$fromdate' AND '$currentdate' AND username='$username' AND closed='1'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
//firstname	lastname	company	email	designation	phoneno	attachmentloc	follow_up	date

function createleaddb($table_name, $firstname, $lastname, $company,$curl, $email, $designation, $phoneno, $username, $follow_up, $closed, $amount, $date, $leadname, $file_loc){
	//$vol = str_replace('-',' ',$vol);
    global $DB;
    $rs = array();
	$sql = "INSERT INTO " . $table_name . " (firstname, lastname, company, curl, email, designation, phoneno, username, follow_up, closed, amount, date, leadname, file_loc) VALUES ('$firstname', '$lastname','$company','$curl','$email','$designation','$phoneno','$username','$follow_up','$closed','$amount','$date','$leadname','$file_loc')";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function check_if_lead_exists_sameuser($table_name, $username, $email){
	 global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE username = '$username' AND email = '$email' ORDER BY sl_no DESC";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       return 1;
    }else{
		return 0;
	}
	
}
function check_if_user_exists($user){
	 global $DB;
    $rs = array();
    $sql = "SELECT * FROM crm_auth WHERE username = '$user' ORDER BY sl_no DESC";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       return 1;
    }else{
		return 0;
	}
}
function check_if_user_exists2($sl){
	 global $DB;
    $rs = array();
    $sql = "SELECT * FROM crm_auth WHERE sl_no = '$sl'";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       return 1;
    }else{
		return 0;
	}
}
function delete_lead($email,$username){
	 global $DB;
    $rs = array();
	$sql = "DELETE FROM leads_db WHERE email = '$email' AND username = '$username'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function delete_lead_sales($email,$sl_no){
	 global $DB;
    $rs = array();
	$sql = "DELETE FROM leads_db WHERE email = '$email' AND sl_no = '$sl_no'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function delete_pitch($campaign,$pitch,$username){
	 global $DB;
    $rs = array();
	$sql = "DELETE FROM pitch_sub WHERE campaign_name = '$campaign' AND user_name = '$username' AND pitch = '$pitch'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function save_pitch_sub($table_name, $user_name, $campain, $subject, $pitch){
	 global $DB;
    $rs = array();
	$sql = "INSERT INTO " . $table_name . "(campaign_name, user_name, subject, pitch) VALUES ('$campain','$user_name','$subject','$pitch')";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function createuserdb($user, $pass, $access, $status, $designation, $associate){
	 global $DB;
    $rs = array();
	$sql = "INSERT INTO crm_auth (username, password, access, status, designation, accosiated) VALUES ('$user','$pass','$access','$status', '$designation', '$associate')";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function edituserdb($sl, $user, $pass, $access2, $status, $designation, $associate){
	 global $DB;
    $rs = array();
	$sql = "UPDATE crm_auth SET username='$user', password='$pass', access='$access2', status='$status', designation='$designation', accosiated='$associate' WHERE sl_no='$sl'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
	
}
function check_pitch_sub($table_name, $user_name, $campain, $subject){
	 global $DB;
    $rs = array();
    $sql = "SELECT * FROM " . $table_name . " WHERE campaign_name = '$campain' AND user_name = '$user_name' AND subject = '$subject' ORDER BY sl_no DESC";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       return true;
    }else{
		return false;
	}
}
function countdata_pitch_data($table_name, $user_name){
	$sql = "SELECT * FROM " . $table_name . " WHERE user_name = '$user_name'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function get_all_user_crm($table_name){
	$sql = "SELECT * FROM " . $table_name ;	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function search_match($table_name, $input){
	$sql = "SELECT * FROM crm_auth WHERE username LIKE '%$input%'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function user($table_name){
	$sql = "SELECT * FROM " . $table_name ;	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function fetch_one_value($table_name, $felidtosearch, $fetchvalue){
	$sql = "SELECT * FROM " . $table_name . " WHERE $felidtosearch = '$fetchvalue'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function updateuserdb($username, $password_enc, $access, $status, $designation, $associate){
	 global $DB;
    $rs = array();
	$sql = "UPDATE crm_auth SET password='$password_enc', access='$access', status='$status', designation='$designation', accosiated='$associate' WHERE username='$username'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function update_info_routing_table($name, $username, $password_enc, $email, $phone, $address, $designation,$status2){
	global $DB;
    $rs = array();
	$sql = "UPDATE lead_info_table SET name='$name', password='$password_enc', email='$email', contactno='$phone', address='$address', designation='$designation', status='$status2' WHERE username='$username'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}


function add_info_routing_table($name,$username,$password,$email,$phone,$address,$designation,$associate,$status2){
	 global $DB;
    $rs = array();
	$sql = "INSERT INTO lead_info_table(name, username, password, email, contactno, address, designation, associated, status) VALUES ('$name','$username','$password','$email', '$phone', '$address', '$designation', '$associate', '$status2')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function check_manager_accos($manager,$agent){
	 global $DB;
    $rs = array();
    $sql = "SELECT * FROM lead_info_table WHERE username = '$agent' AND associated = '$manager' AND status = '1'";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

    if (count($results) > 0) {
       return 1;
    }else{
		return 0;
	}
}
function update_manager($manager,$accos){
	global $DB;
    $rs = array();
	$sql = "UPDATE lead_info_table SET associated='$manager' WHERE username='$accos'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function update_manager_crm_auth($manager,$accos){
	global $DB;
    $rs = array();
	$sql = "UPDATE crm_auth SET accosiated='$manager' WHERE username='$accos'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
}
function get_all_his_team($manager){
	$sql = "SELECT * FROM lead_info_table WHERE associated='$manager' AND status = '1'";	
	$link = mysqli_connect(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
	//mysqli_select_db(DB_DATABASE, $link);
	$result = mysqli_query($link, $sql);
	 $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//return $num_rows = mysqli_num_rows($result);
	return $results;
}
function delete_from_lead($sl){
	 global $DB;
    $rs = array();
	$sql = "DELETE FROM lead_info_table WHERE username = '$sl'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function delete_from_crm($sl){
	 global $DB;
    $rs = array();
	$sql = "DELETE FROM crm_auth WHERE username = '$sl'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function delete_proxy($proxyname){
	 global $DB;
    $rs = array();
	$sql = "DELETE FROM proxy WHERE name = '$proxyname'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function delete_proxy_cap($proxyname){
	 global $DB;
    $rs = array();
	$sql = "DELETE FROM captcha WHERE name = '$proxyname'";
    
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }

}
function write_proxy_to_database($servernumber, $proxy_name, $serverinfo, $user_final){
	global $DB;
    $rs = array();
	$time = date('Y-m-d h-i-s', time());
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO proxy (server_no, name, Serverinfo, Userpass) VALUES ('$servernumber', '$proxy_name', '$serverinfo', '$user_final')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
    }
	
}
function writecapatcha($txt2){
	global $DB;
    $rs = array();
	$time = date('Y-m-d h-i-s', time());
    //$sql = "INSERT INTO " . $table_name . " (content, slug, title, keyword, description, subtitle, image) VALUES ('". $paragraph ."', '". $slug . "', '". $title . "', '" . $subtitle ."', '" . $subtitle ."', '". $target_database ."')";
	$sql = "INSERT INTO captcha (name, capdata) VALUES ('WEBSHARE_PROXY', '$txt2')";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
    } catch (Exception $ex) {
        $error = errorMessage($ex->getMessage());
		echo $error;
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