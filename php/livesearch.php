<?php
include_once '../db/config.php';
$table_name = "crm_auth";
if(isset($_GET['search'])){
	$input =  $_GET['search'];
	$search = search_match($table_name, $input);
	if($search){
		foreach($search as $sear){
			echo "<li onclick=\"getPaging(this.id)\" id=\"".$sear['username']."\" class=\"option\">".$sear['username']."</li>\n";
		}
	}else{
		echo "<li onclick=\"\" value=\"1\" class=\"option\">No Results</li>";
	}
	
}
?>