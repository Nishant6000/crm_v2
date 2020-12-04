<?php
date_default_timezone_set("America/New_York");
$date = date("Y-m-d");
$file_loc = "../proxy/"; 
if(isset($_GET['querylmt'])){
	$querylmt = $_GET['querylmt'];// querylmt 
	$noofproxy = $_GET['proxyurl']; // noofproxy
	$proxyuser = $_GET['proxyuname']; // serverurl
	$proxypass = $_GET['proxypass']; // serverurl
			if (!file_exists($file_loc)) {
				mkdir($file_loc, 0777, true);
			}
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, "https://api.oxylabs.io/v1/proxies/lists");
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_USERPWD, $proxyuser.':'.$proxypass);
			$result = curl_exec($curl);
			$result_array = json_decode($result, TRUE);
			$ipcount = $result_array[0]['ips_count'];
			$link = $result_array[0]['href'];
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $result_array[0]['href']);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_USERPWD, $proxyuser.':'.$proxypass);
			$result = curl_exec($curl);
			$result_array_new = json_decode($result, TRUE);
			if($result_array_new){
				$k=1;
				foreach ($result_array_new as $resultbox){
				$filename = $file_loc."server-$k.inf";
				$fh = fopen($filename, 'w') or die("Failed to read file"); 
				$txt2 = $querylmt."|".$ipcount."|".$resultbox['ip'].':'.$resultbox['port']."|0|ACTIVE|".$date;
				fwrite($fh, $txt2);
				fclose($fh);
				$k++;
				}
				echo "File Created Successfully";	
			}else{
				echo "File Created Failed";
			}
			
			
		
}
?>