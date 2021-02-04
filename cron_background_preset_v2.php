<?php
include('../db_v2/config.php');
date_default_timezone_set("America/New_York");
	$date = date("Y-m-d");
	$file_loc = "../proxy/"; 
	$user_final = "";
	$header = array();
	$ka = 2;
	$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,"; 
	$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5"; 
	$header[] = "Cache-Control: max-age=0"; 
	$header[] = "Connection: keep-alive"; 
	$header[] = "Keep-Alive: 300"; 
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7"; 
	$header[] = "Accept-Language: en-us,en;q=0.5"; 
	$header[] = "Pragma: "; //browsers keep this blank. 
	$proxybulder = true;
	while(1){
if($proxybulder){
	$querylmt = 50;// querylmt 
	$proxyurl = "https://proxy.webshare.io/api/proxy/list/"; // noofproxy
	$proxyapi = "e5b88d7e31d6aec39876e44c1b5c2404615675d0"; // serverurl
	$header[] = 'Authorization: Token '.$proxyapi; 
			if (!file_exists($file_loc)) {
				mkdir($file_loc, 0777, true);
			}
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $proxyurl);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
			$result = curl_exec($curl);
			$result_array = json_decode($result);
			//print_r($result_array);
			$proxy_name = "WEBSHARE_PROXY";
					delete_proxy($proxy_name);
					delete_proxy_cap($proxy_name);
					create_proxy_cap($proxy_name);
				if($result_array->count < 250){
					if($result_array->results){
					$ipcount = $result_array->count;
					//$user_final = $ipcount."|";
					$k=1;
					
					foreach ($result_array->results as $resultbox){
					$username = $resultbox->username;
					$password = $resultbox->password;
					$user_final = $username.":".$password."|";
					/*$filename = $file_loc."server-$k.inf";
					$filename2 = $file_loc."password-$k.inf";
					$fh = fopen($filename, 'w') or die("Failed to read file"); 
					$txt2 = $querylmt."|".$ipcount."|".$resultbox->proxy_address.":".$resultbox->ports->http."|0|ACTIVE|".$date;
					fwrite($fh, $txt2);
					fclose($fh);
					$fh = fopen($filename2, 'w') or die("Failed to read file");
					fwrite($fh, $user_final);
					fclose($fh);*/
					$proxy_name = "WEBSHARE_PROXY";
					$servernumber = $k;
					$serverinfo = $querylmt."|".$ipcount."|".$resultbox->proxy_address.":".$resultbox->ports->http."|0|ACTIVE|".$date;
					write_proxy_to_database($servernumber,$proxy_name,$serverinfo,$user_final);
					$k++;
					}
					echo "File Created Successfully";
					
				}else{
					echo "File Created Failed";
				}
			}else{
				$loopcnt = $result_array->count/100; // Each page can only list 25 proxies
					if($result_array->results){
					$ipcount = $result_array->count;
					//$user_final = $ipcount."|";
					$k=1;
					foreach ($result_array->results as $resultbox){
						
					$username = $resultbox->username;
					$password = $resultbox->password;
					$user_final = $username.":".$password."|";
					
					//echo $resultbox->proxy_address.":".$resultbox->ports->http;
					//echo "</br>";
					/*$filename = $file_loc."server-$k.inf";
					$filename2 = $file_loc."password-$k.inf";
					$fh = fopen($filename, 'w') or die("Failed to read file"); 
					$txt2 = $querylmt."|".$ipcount."|".$resultbox->proxy_address.":".$resultbox->ports->http."|0|ACTIVE|".$date;
					fwrite($fh, $txt2);
					fclose($fh);
					$fh = fopen($filename2, 'w') or die("Failed to read file");
					fwrite($fh, $user_final);
					fclose($fh);*/
					$proxy_name = "WEBSHARE_PROXY";
					$servernumber = $k;
					$serverinfo = $querylmt."|".$ipcount."|".$resultbox->proxy_address.":".$resultbox->ports->http."|0|ACTIVE|".$date;
					//delete_proxy($proxy_name);
					write_proxy_to_database($servernumber,$proxy_name,$serverinfo,$user_final);
					
					$k++;
					}
					echo "Page 1 Created successfully";
					echo "</br>";
					$next = $result_array->next;
						if(!stristr($next,"http")){
							$next = "https://proxy.webshare.io".$next;
						}
					
					}else{
						echo "File Created Failed";
					}
				for($i=0;$i<$loopcnt;$i++){
					$j = $i + 1;
					$k = 100*$j;
					
						if($next){
							if(!stristr($next,"http")){
							$next = "https://proxy.webshare.io".$next;
							}
						$curl = curl_init();
						curl_setopt($curl, CURLOPT_URL, $next);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
						$result = curl_exec($curl);
						$result_array = json_decode($result);
						
							if($result_array->results){
							$ipcount = $result_array->count;
							//$user_final = $ipcount."|";
							$k=$k+1;
							foreach ($result_array->results as $resultbox){
								//echo $resultbox->proxy_address.":".$resultbox->ports->http;
							//echo "</br>";
							$username = $resultbox->username;
							$password = $resultbox->password;
							$user_final = $username.":".$password."|";
							//===================Old Code With Text==========================================
							//$filename = $file_loc."server-$k.inf";
							//$filename2 = $file_loc."password-$k.inf";
							//$fh = fopen($filename, 'w') or die("Failed to read file"); 
							//$txt2 = $querylmt."|".$ipcount."|".$resultbox->proxy_address.":".$resultbox->ports->http."|0|ACTIVE|".$date;
							//fwrite($fh, $txt2);
							//fclose($fh);
							//$fh = fopen($filename2, 'w') or die("Failed to read file");
							//fwrite($fh, $user_final);
							//fclose($fh);
							//==================================================================================
							//==============================New with Database=================================================
							$proxy_name = "WEBSHARE_PROXY";
							$servernumber = $k;
							$serverinfo = $querylmt."|".$ipcount."|".$resultbox->proxy_address.":".$resultbox->ports->http."|0|ACTIVE|".$date;
							//delete_proxy($proxy_name);
							//delete_proxy($proxy_name);
							write_proxy_to_database($servernumber,$proxy_name,$serverinfo,$user_final);
							
							//================================================================================================
							$k++;
							}
							
							echo "Page ".$ka." Created successfully";
							echo "</br>";
							$ka++;
							$next = $result_array->next;
							
							}else{
								echo "File Created Failed";
							}
						}else{
						echo "No Value in the Next Feild ";
						//die;
						}
						
					
					
					}
			}
			//$fhW = fopen("../proxy/captcha.inf", 'w') or die("Failed to read file"); 
			//$txt2 = "1|".$date;
			//fwrite($fhW, $txt2);
			//fclose($fhW);
			//writecapatcha($txt2);
			
			
			
	}else{
		echo "No Query Recived";
	}
	sleep(1200);
	}
	?>