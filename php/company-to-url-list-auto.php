<?php
include("../classes/class.c2url.php");
$c2url = new companytourl();
$result = $c2url->fetch_clearbit_result("acetllabs");
$results_array = json_decode($result,true);
if(!count($results_array)){
echo "No Results Exists";
}else{
	echo $results_array[0]['domain'];
}

?>