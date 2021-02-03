<?php

class companytourl{

//require_once('../db/config.php');
//public static function curl_proxy($sURL,$sProxyUrl){
//	$ch = curl_init();
//  curl_setopt($ch, CURLOPT_URL, $sURL); // Target URL
//  curl_setopt($ch, CURLOPT_PROXY, $sProxyUrl); // Proxy IP:Port
//  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//  curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, FALSE);
//  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "optinprospects:sj5fQa8eFh"); // Proxy Username/Password
//  curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
//  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//  curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 600);
//  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:5.0) Gecko/20100101 Firefox/5.0'); // some browser user agent string
//  curl_setopt($ch, CURLOPT_REFERER, $sURL);
//  $aHeaders = array( 'Expect:', 
//  'Accept-Language: en-us; q=0.5,en; q=0.3', 
//  'Accept: text/html,application/xhtml+xml,application/xml; q=0.9,*/*; q=0.8');
//  curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeaders);
//  $result = utf8_decode(curl_exec($ch));
//	return $result;
//} 

//==============================class To Route through Proxy
public static function refreshproxy(){
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
	
if(isset($proxybulder){
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
				$loopcnt = $result_array->count/250; // Each page can only list 25 proxies
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
					$k = 250*$j;
					
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
			$txt2 = "1|".$date;
			//fwrite($fhW, $txt2);
			//fclose($fhW);
			writecapatcha($txt2);
			
			
			
	}else{
		echo "No Query Recived";
	}
}

//=====================================================================
public static function fetch_google_result_via_proxy($search,$status,$no){

$search2 = urlencode($search); //encode for google search;
//$proxyfile = "../proxy/server-1.inf"; // first proxy file
$proxyname = "WEBSHARE_PROXY";
$proxyno = "1";
$proxyfile = get_proxy_info($proxyname,$proxyno);

date_default_timezone_set("America/New_York");
$cpdate = date("Y-m-d");

if(!($proxyfile)){// if a proxy doesnt eexist return error msg
	return "^*Please Create Proxy File Using Supervisor Account^*";
}else{
	
	//$fh = fopen($proxyfile, 'r') or die("Failed to read file"); // read the first proxy file
	//$fhr = fgets($fh);
	//fclose($fh);
	$fhr = $proxyfile[0]['Serverinfo'];
	$fhrdata = explode('|', $fhr); // data out from proxy
	$querylmt = $fhrdata[0];
	$noofserver = $fhrdata[1];
	$serverport = $fhrdata[2];
	$currentstatus = $fhrdata[3];
	
	//========================================================================
	// Process Incoming No 
	$pronumbertemp = $no; // row count of excel is $no
	//==============================================================================================
			if($no>$noofserver){ // if excel row count is greater than total no of servers available
					while($pronumbertemp>$noofserver){
						$pronumbertemp = $pronumbertemp - $noofserver; // To make the $pronumbertemp in the range of with the reach server limit
					}
					//===================This Section is to start from the next proxy where capatcha occured=======	
						$pronumbertemp = self::checkcapserver($pronumbertemp);// converted
					
					//=============================================================================================
					
					//=================================================================================================
					$proxyname = "WEBSHARE_PROXY";
					$proxyno = $pronumbertemp;
					$proxyfile = get_proxy_info($proxyname,$proxyno);
					//$proxyno  = "../proxy/server-".$pronumbertemp.".inf"; // convert to database
					$nocapcha = false; // update nocapata if neeed if exist loop
					$ctr = $noofserver; // enable counter with total no of servers ex - 100
					//=====================================================================================================
						if(!($proxyfile)){
							return "^*Please Create Proxy File Using Supervisor Account^*";
						}else{
							while(!$nocapcha){ 
								$tempdata = self::getproxyfilearray($proxyno);// open file and get array // convert to database
								//$fhrdatapy = explode('|', $fhr);
								$querylmtpy = $tempdata[0];
								$noofserverpy = $tempdata[1];
								$serverportpy = $tempdata[2];
								$currentstatuspy = $tempdata[3];
								$statuspy = $tempdata[4];
								$ddate = $tempdata[5];
								if($querylmtpy>$currentstatuspy){// To check the no of query does not exceed the limit
											$tempreturndata = queryproxy($serverportpy, $status, $search2, $pronumbertemp);// 
											if(self::checkcap($tempreturndata)){ // check if capatcha  
												self::updatedeactive($proxyno); //captacha arrived so deactive // convert to database
												$ctr--; // $ctr reduced to update if all server ex:100 has recive capacha on that particular date
												$nocapcha = false;  // captacha equals to false in order to query other server if capacha with out existing loop
													if($ctr==0){ // reached end of server query
														$nocapcha = true; // captcha arrived;
													}else{
														if($pronumbertemp == $noofserverpy){ //total sever no to retrive file equals no of servers
															
															$proxyno = $pronumbertemp;//update proxy file // convert to database
															// To Get the next proxy server id
															$pronumbertemp = 1; // update 1 after proxy file listed
														}else{
														$pronumbertemp++;
														$proxyno = $pronumbertemp;//update proxy file
														}
														
													}
											}else{
												$nocapcha = true; // update so that can exist the loop
												//$ctr--;  /// finaL correction to be done here
												$currentstatuspy++;
												self::updatecstatus($proxyno,$currentstatuspy); // convert to database
											}
								}else{
									if($statuspy == "ACTIVE" && $currentstatuspy == $querylmtpy){ // check if ACTIVE and current status query limit
											self::updatedeactive($proxyno);
											$tempreturndata = queryproxy($serverportpy, $status, $search2, $pronumbertemp);// if querylimit greater than 
											
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyno);
												$ctr--;								// working is same as above functions
												$nocapcha = false; // stay in loop
													if($ctr==0){
														$nocapcha = true; // exit loop
													}else{
														if($pronumbertemp == $noofserverpy){
															$proxyno = $pronumbertemp;//update proxy file
															$pronumbertemp = 1;
														}else{
															$pronumbertemp++;
															$proxyno = $pronumbertemp;//update proxy file
														}
													}
											}else{
												$nocapcha = true;
												//$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyno,$currentstatuspy);
											}
									}else if($statuspy == "DEACTIVE" && $ddate != $cpdate){ // check if deactive and date old. Then update it with active  
										$statuspy == "ACTIVE";
										$currentstatuspy = 0;
										self::updateactive($proxyno);
										self::updatecstatus($proxyno,$currentstatuspy);
										$tempreturndata = queryproxy($serverportpy, $status, $search2, $pronumbertemp);// if querylimit greater than 
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyno);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyno = $pronumbertemp;//update proxy file
															//refresh proxy
															sleep(1000);
															self::refreshproxy();
															//======================
															
														}else{
														$pronumbertemp++;
														$proxyno = $pronumbertemp;//update proxy file
														}
													}
											}else{
												$nocapcha = true;
												//$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyno,$currentstatuspy);
											}
									}else{ // if deactive and same date 
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															
															$proxyno = $pronumbertemp;//update proxy file
															$pronumbertemp = 1;
															
														}else{
														$pronumbertemp++;
														$proxyno = $pronumbertemp;//update proxy file
														}
													}
									}
								}
								
									
							}
							return $tempreturndata;
						}
					
					
					
					//======================================================================================================
						
			}else{
					$data = "excel file row=".$pronumbertemp."\n";
					self::write_log($data);
					//============================Check Capatcha Server============================================
					$pronumbertemp = self::checkcapserver($pronumbertemp);
					//=============================================================================================
					$proxyname = "WEBSHARE_PROXY";
					$proxyno = $pronumbertemp;
					$proxyfile = get_proxy_info($proxyname,$proxyno);
					$nocapcha = false;
					$ctr = $noofserver;
		 	//=====================================================================================================
						if(!($proxyfile)){
							return "^*Please Create Proxy File Using Supervisor Account^*";
						}else{
							while(!$nocapcha){ // Do Till Capatcha or End of query
								$tempdata = self :: getproxyfilearray($proxyno);
								
								$fhrdatapy = explode('|', $fhr);
								$querylmtpy = $tempdata[0];
								$noofserverpy = $tempdata[1];
								$serverportpy = $tempdata[2];
								$currentstatuspy = $tempdata[3];
								$statuspy = $tempdata[4];
								$ddate = $tempdata[5];
								$data = "Server Port = ".$serverportpy."-".$currentstatuspy."\n";
								self::write_log($data);
								if($querylmtpy>$currentstatuspy){ // If query limit is greater that daily queried limit
								
											$tempreturndata = self::queryproxy($serverportpy, $status, $search2, $pronumbertemp);// if querylimit greater than 
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyno);  // if capatcha update deactive
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$proxyno = $pronumbertemp;//update proxy file
															$pronumbertemp = 1;
														}else{
														$pronumbertemp++;
														$proxyno = $pronumbertemp;//update proxy file
														}
														
													}
											}else{
												$nocapcha = true;
												//$ctr--;
												$currentstatuspy++;
												
												self::updatecstatus($proxyno,$currentstatuspy);
												
											}
								}else{
									if($statuspy == "ACTIVE" && $currentstatuspy == $querylmtpy){  // if ACTIVE current query equals to querylimit
									
											self::updatedeactive($proxyno);
											$tempreturndata = self::queryproxy($serverportpy, $status, $search2, $pronumbertemp);// if querylimit greater than 
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyno);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															
															$proxyno = $pronumbertemp;//update proxy file
															$pronumbertemp = 1;
														}else{
															$pronumbertemp++;
															$proxyno = $pronumbertemp;//update proxy file
														}
													}
											}else{
												$nocapcha = true;
												//$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyno,$currentstatuspy);
											}
									}else if($statuspy == "DEACTIVE" && $ddate != $cpdate){
										
										$statuspy == "ACTIVE";
										$currentstatuspy = 0;
										self::updateactive($proxyno);
										self::updatecstatus($proxyno,$currentstatuspy);
										$tempreturndata = self::queryproxy($serverportpy, $status, $search2, $pronumbertemp);// if querylimit greater than 
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyno);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															
															$proxyno = $pronumbertemp;//update proxy file
															$pronumbertemp = 1;
														}else{
														$pronumbertemp++;
														$proxyno = $pronumbertemp;//update proxy file
														}
													}
											}else{
												$nocapcha = true;
												//$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyno,$currentstatuspy);
											}
									}else{
										
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															
															$proxyno = $pronumbertemp;//update proxy file
															$pronumbertemp = 1;
															
														}else{
														$pronumbertemp++;
														$proxyno = $pronumbertemp;//update proxy file
														$nocapcha = false;
														}
													}
									}
									$data = "server-no= i am Here".$pronumbertemp."\n";
									self::write_log($data);
								}
								
									
							}
							return $tempreturndata;
						}	
			}


	}
	
	}
	
	public static function checkcapserver($serverno){
		$proxyname = "WEBSHARE_PROXY";
		$proxyfile = get_cap_stat($proxyname);
			$fhr = $proxyfile[0]['capdata'];
			$fhrexp = explode('|', $fhr);
			
			if($fhrexp[0] < $serverno){
				return $serverno;
			}else{
				return $fhrexp[0] + 1;
			}
	}
	
	public static function updatedeactive($datafileproxy){
		date_default_timezone_set("America/New_York");
			$date = date("Y-m-d");
			$proxyname = "WEBSHARE_PROXY";
			$proxyfile = get_proxy_info($proxyname,$datafileproxy);
			$fhr = $proxyfile[0]['Serverinfo'];
			$fhrdatapy = explode('|', $fhr);
			$querylmtpy = $fhrdatapy[0];
			$noofserverpy = $fhrdatapy[1];
			$serverportpy = $fhrdatapy[2];
			$currentstatuspy = $fhrdatapy[3];
			$statuspy = "DEACTIVE";
			$data = "Capatcha Reacived= On ".$currentstatuspy."Server"."\n";
			$txt2 = $querylmtpy."|".$noofserverpy."|".$serverportpy."|".$querylmtpy."|".$statuspy."|".$date;
			write_current_status($datafileproxy, $txt2);
			//============================================Write To log==================
			$data .= "server-no=".$datafileproxy."Writen to file".$txt2."\n";
			self::write_log($data);
			//================================capatcha file=========
			//$temp = explode('-',$datafileproxy);
			//$temp2 = explode('.',$temp[1]);
			$temp3 = $datafileproxy;
			if($temp3 >= $noofserverpy){
				$temp3 = 0;
			}
			$txt2 = $temp3."|".$date;
		
			write_capatcha($proxyname, $txt2);
				
			//==========================================================
	}
	public static function updateactive($datafileproxy){
		date_default_timezone_set("America/New_York");
			$date = date("Y-m-d");
			$proxyname = "WEBSHARE_PROXY";
			$proxyfile = get_proxy_info($proxyname,$datafileproxy);
			$fhr = $proxyfile[0]['Serverinfo'];
			$fhrdatapy = explode('|', $fhr);
			$querylmtpy = $fhrdatapy[0];
			$noofserverpy = $fhrdatapy[1];
			$serverportpy = $fhrdatapy[2];
			$currentstatuspy = 0;
			$statuspy = "ACTIVE";
			$txt2 = $querylmtpy."|".$noofserverpy."|".$serverportpy."|".$currentstatuspy."|".$statuspy."|".$date;
			write_current_status($datafileproxy, $txt2);
			$data = "server-no=".$datafileproxy."Writen to file".$txt2."\n";
			self::write_log($data);
			
	}
	public static function updatecstatus($datafileproxy, $cstatuspy){
		$proxyname = "WEBSHARE_PROXY";
		$proxyfile = get_proxy_info($proxyname,$datafileproxy);
		$fhr = $proxyfile[0]['Serverinfo'];
		$fhrdatapy = explode('|', $fhr);
		$querylmtpy = $fhrdatapy[0];
		$noofserverpy = $fhrdatapy[1];
		$serverportpy = $fhrdatapy[2];
		$cstat = $fhrdatapy[3];
		$statuspy = $fhrdatapy[4];
		$ddate = $fhrdatapy[5];
		$fhW = fopen($datafileproxy, 'w') or die("Failed to read file"); 
		$cstat++;
		$txt2 = $querylmtpy."|".$noofserverpy."|".$serverportpy."|".$cstatuspy."|".$statuspy."|".$ddate;
		write_current_status($datafileproxy, $txt2);
		$data = "server-no=".$datafileproxy."Writen to file".$txt2."\n";
		self::write_log($data);
	}
	public static function write_log($data){
		$fh = fopen("./log/alllogs.txt", 'a+') or die("Failed to read file"); 
		fwrite($fh, $data);
		fclose($fh);
		sleep(2);
		
	}	
	public static function checkcap($data){
		
		if(stristr($data,"302 Moved")){
			return $cap = true;							
		}else if(stristr($data,"Our systems have detected unusual traffic from your computer")){
			return $cap = true;	
		}else if(stristr($data,"Your client does not have permission to get")){
			return $cap = true;	
		}else{
			return $cap = false;	
		}
	}
//=========================================================== 
public static function curl($url,$refer){
  $user_agent='Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36'; 
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt ($ch, CURLOPT_HEADER, 0);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_REFERER, $refer);
  $result = curl_exec($ch);
  curl_close ($ch);
  return $result;
}
public static function curl_proxy($sURL,$sProxyUrl,$no){
	$proxyfile_auth = $no;
	if($proxyfile_auth){
		$proxy_file = self::getproxyfilearray_pass($proxyfile_auth);
		$proxyauth = $proxy_file[0];
	}else{
		$proxyauth = 'optinprospects:mELb727ZnH';
		
	}
	
//====================================================

//================================================	

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$sURL);
curl_setopt($ch, CURLOPT_PROXY, $sProxyUrl);
 curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$aHeaders = array( 'Expect:', 
  'Accept-Language: en-us; q=0.5,en; q=0.3', 
  'Accept: text/html,application/xhtml+xml,application/xml; q=0.9,*/*; q=0.8');
 curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeaders); 
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
return $curl_scraped_page;
}  

public static function fetch_google_result($search,$status){
$search2 = urlencode($search);
if ($status == 1){
$url = "https://www.google.com/search?hl=en&q=". $search2 ."&btnG=Google+Search";
$resultg = self :: curl($url, 'https://www.google.com');
}elseif($status == 2){
  $url = "https://www.google.com/search?num=25&pws=0&q=". $search2 ."&btnG=Google+Search";
  $resultg = self :: curl($url, 'https://www.google.com');
}else{
  $url = "https://www.google.com/search?num=100&pws=0&q=". $search2 ."&btnG=Google+Search";
  $resultg = self :: curl($url, 'https://www.google.com'); 
}
return $resultg;
}
public static function queryproxy($serverport, $status, $search2, $pronumbertemp){
		
		if ($status == 1){
		$url = "https://www.google.com/search?hl=en&q=". $search2 ."&btnG=Google+Search";
		$resultg = self::curl_proxy($url, $serverport, $pronumbertemp);
		}elseif($status == 2){	
		  $url = "https://www.google.com/search?num=25&pws=0&q=". $search2 ."&btnG=Google+Search";
		  $resultg = self::curl_proxy($url, $serverport, $pronumbertemp);
		}else{
		  $url = "https://www.google.com/search?num=100&pws=0&q=". $search2 ."&btnG=Google+Search";
		  $resultg = self::curl_proxy($url, $serverport, $pronumbertemp); 
		}
		return $resultg;
	}

public static function getproxyfilearray($proxyno){
	$proxyname = "WEBSHARE_PROXY";
	$proxyfile = get_proxy_info($proxyname,$proxyno);
	$fhr = $proxyfile[0]['Serverinfo'];
	$fhrdatapy = explode('|', $fhr);
	return $fhrdatapy;
}
public static function getproxyfilearray_pass($proxyno){
	$proxyname = "WEBSHARE_PROXY";
	$proxyfile = get_proxy_info($proxyname,$proxyno);
	$fhr = $proxyfile[0]['Userpass'];
	$fhrdatapy = explode('|', $fhr);
	return $fhrdatapy;
}	
public static function fetch_bing_result($search){
$search2 = urlencode($search);
$url = "https://www.bing.com/search?q=". $search2 ."&count=30&first=1";
$url2 = "https://www.bing.com/search?q=". $search2 ."&count=50&first=2";
$url3 = "https://www.bing.com/search?q=". $search2 ."&count=50&first=3";
$resultb = self :: curl($url, 'https://www.bing.com/');
$resultb .= self :: curl($url2, 'https://www.bing.com/');
$resultb .= self :: curl($url3, 'https://www.bing.com/');

return $resultb;
}
public static function fetch_clearbit_result($search){
$search2 = urlencode($search);
$url = "https://autocomplete.clearbit.com/v1/companies/suggest?query=".$search2;
$resultb = self :: curl($url, 'https://autocomplete.clearbit.com');
return $resultb;
}
public static function fetch_yandex_result($search){
$search2 = urlencode($search);
$url = "https://yandex.com/search/?text=".$search2."&lr=21007";
//$resulty = file_get_contents($url);
$resulty = self :: curl($url, 'https://yandex.com/search/');
return $resulty;

}

public static function fetch_duckduck_result($search){
$search2 = urlencode($search);
$url = "https://duckduckgo.com/?q=". $search2 ."ia=web&count=50&first=51";
$resultd = self :: curl($url, 'https://duckduckgo.com/');

return $resultd;
}
public static function get_domain($url)
{
  
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
} 

public static function extract_emails_from($string,$urlp){
  $filtered_words = "www,email-,consolidated,dollar,money,clients,client,fill,mail,web,custsupport,inquiries,hrose,abuse,accounts,first,Last,contact,hello,xxxx,websupport,salesinquiry,jane,doe,thing,proceed,social,webmaster,about,aboutinfo,jobs,press,issue,partners,stop,editorial,privacy,rip,edu,dataprotection,data,store-news,employment,news,legal,membership,services,sample,training,customerservice,upport,admin,security,careers,resumes,touch,recruitment,media,no-reply,ir,vid,ask,tech,domain,investor,license,jxxxxxxxxxxt,wxxxxxxxxxxxs,kxxxxxxxxr,first_initial,valid-email,mailman,jane.doe,hey,hostmaster,host,noreply,citizens,recruiting,javamail_ww,cds,ps,xyz,mail,group,groupaccounts,efiling,egovernance,governance,corp,national,split,ngo,internet,user,max,admin,separate,netsupp,tester,billing,outreach,vccd,dispatcher,administrator,hr,ops,analyst,service,desk,quarantine,opensource,everybody,app,apps";
  $final = "";
  preg_match_all("/[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}/i", $string, $matches);
  $filter = explode(",", $filtered_words);
  //$emails = str_ireplace($filter, '', $matches[0]);
  $trimmed = (implode("<br/>",$matches[0]));
  $new = array_unique(explode("<br/>", $trimmed));
 
  foreach ($new as $new2){  
    if (strpos($new2, $urlp) !== false) {
      if(preg_match("/[A-Z]/", $new2)===0) {
		  $resctr = 0;
		  $new3 =  explode("@", $new2);
		  if($new3[0] != "" && $new3[0] != " " ){
			  foreach ($filter as $filterp){
				  if(stristr($new3[0], $filterp)){
					  $resctr++;
				  }
			  }
				  if($resctr == 0){
					  $final .= $new2;
					  $final .= "</br>";
				  }else{
					  
				  }
			  
			    
		  }
        
        }
    }
    //if(preg_match("/[A-Z]/", $new2)!==0) {
      //echo $new2;
      //echo "</br>";
    //}else {
      
    //}


  }
  return $final;
  //$newemail = implode("<br/>",$new);
  //return $newemail;
}

public static function process_google_results($data,$domain){
    $array = array();
    $i=0;
    $dom = new DOMDocument(1.0);
    @$dom->loadHTML($data);
    $xpath = new DOMXpath($dom);
    $articles = $xpath->query('//div[@class="r"]');  // get googles div class r
      foreach ($articles as $item)
      {
        $arr = $item->getElementsByTagName('a');  //
            foreach ($arr as $arr2){
            
              $arrres = $arr2->getAttribute('href');

              if(strstr($arrres, '#')){ // if # no results
              }else if(strstr($arrres, 'https://webcache')){ // prase out where webcache
                  $arrresp = explode(":", $arrres); // 
                  $arrresp2 = $arrresp[3] .':'. $arrresp[4]; // combine to get url
                     $arrresp3 = explode("+", $arrresp2); // remove google extra add on in the url
                      
                      $array[$i] = $arrresp3[0];
                      $i++;
                     
              }
              
              if($i == 3){
                return $array;
              }
             
               
            }
            
      }
      
}
public static function process_google_results_proxy($data,$domain){
	
    $array = array();
    $i=0;
    $dom = new DOMDocument(1.0);
    @$dom->loadHTML($data);
    $xpath = new DOMXpath($dom);
    $articles = $xpath->query('//div[@class="kCrYT"]');  // get googles div class r
	
      foreach ($articles as $item)
      {
        $arr = $item->getElementsByTagName('a');  //
		
            foreach ($arr as $arr2){
           
              $arrres = $arr2->getAttribute('href');
 
              if(strstr($arrres, '#')){ // if # no results
			  
              }else if(strstr($arrres, 'https://webcache')){ // prase out where webcache
                  $arrresp = explode(":", $arrres); // 
                  $arrresp2 = $arrresp[3] .':'. $arrresp[4]; // combine to get url
                     $arrresp3 = explode("+", $arrresp2); // remove google extra add on in the url
                      
                      $array[$i] = $arrresp3[0];
                      $i++;
                     
              }else{
				  $array = $arrres;
				  $array_buf = explode('q=',$array);
				   
				   $array_buf2 = explode('/',$array_buf[1]);
				   $array = $array_buf2[0]."//".$array_buf2[2];
				  
			  }
			 
              return $array;
             
             
               
            }
            
      }
      
}
public static function process_email_topology($email1,$email2,$email3){
		$pat1 = 0;
		$pat2 = 0;
		$pat3 = 0;
		$pat4 = 0;
		$pat5 = 0;
		$emailarray = explode('@',$email1);
		$emailarray2 = explode('@',$email2);
		$emailarray3 = explode('@',$email3);
		if(stristr($emailarray[0],'.')){
			$pat1 = $pat1 + 1;
		}elseif(stristr($emailarray[0],'-')){
			$pat2 = $pat2 + 1;
		}elseif(stristr($emailarray[0],'_')){
			$pat3 = $pat3 + 1;
		}else{
			$pat4 = $pat4 + 1;
		}
		if(stristr($emailarray2[0],'.')){
			$pat1 = $pat1 + 1;
		}elseif(stristr($emailarray2[0],'-')){
			$pat2 = $pat2 + 1;
		}elseif(stristr($emailarray2[0],'_')){
			$pat3 = $pat3 + 1;
		}else{
			$pat4 = $pat4 + 1;
		}
		if(stristr($emailarray3[0],'.')){
			$pat1 = $pat1 + 1;
		}elseif(stristr($emailarray3[0],'-')){
			$pat2 = $pat2 + 1;
		}elseif(stristr($emailarray3[0],'_')){
			$pat3 = $pat3 + 1;
		}else{
			$pat4 = $pat4 + 1;
		}
		if($pat1 >= 2 ){
			return $val = "1";
		}elseif($pat2 >= 2 ){
			return $val = "2";
		}elseif($pat3 >= 2 ){
			return $val = "3";
		}elseif($pat4 >= 2){
			return $val = "4";
		}else{
			return $val = "0";
		}
}

}
?>