<?php

if(isset($_GET['data'])){
	$data = explode('|',$_GET['data']);
	if($data[1] != null){
		$filename = "../".$data[1];
		if(file_exists($filename)){
			unlink($filename);
			$filename = "../".$data[0];
			if(file_exists($filename)){
			   unlink($filename);
			}
			echo "^~";
		}else{
			echo "^~";
		}
	}else{
		$filename = "../".$data[0];
		if(file_exists($filename)){
			
			unlink($filename);
			echo "^~";
		}else{
			echo "^~";
		}
		
	}		
}else {
	echo "";
}
?>