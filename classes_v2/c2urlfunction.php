<?php
public static function fetch_google_result_via_proxy($search,$status,$no){
$search2 = urlencode($search);
$proxyfile = "../proxy/server-1.inf";
date_default_timezone_set("America/New_York");
$cpdate = date("Y-m-d");
if(!file_exists($proxyfile)){
	return "^*Please Create Proxy File Using Supervisor Account^*";
}else{
	
	$fh = fopen($proxyfile, 'r') or die("Failed to read file"); 
	$fhr = fgets($fh);
	fclose($fh);
	$fhrdata = explode('|', $fhr);
	$querylmt = $fhrdata[0];
	$noofserver = $fhrdata[1];
	$serverport = $fhrdata[2];
	$currentstatus = $fhrdata[3];
	
	//========================================================================
	// Process Incoming No 
	$pronumbertemp = $no;
			if($no>$noofserver){ // if incoming request is greater than total no of servers available
					
					while($pronumbertemp>$noofserver){
						$pronumbertemp = $pronumbertemp - $noofserver;
					}
					$proxyfile = "../proxy/server-".$pronumbertemp.".inf";
					$nocapcha = false;
					$ctr = $noofserver;
					//=====================================================================================================
						if(!file_exists($proxyfile)){
							return "^*Please Create Proxy File Using Supervisor Account^*";
						}else{
							while(!$nocapcha){
								$tempdata = getproxyfilearray($proxyfile);
								$fhrdatapy = explode('|', $fhr);
								$querylmtpy = $tempdata[0];
								$noofserverpy = $tempdata[1];
								$serverportpy = $tempdata[2];
								$currentstatuspy = $tempdata[3];
								$statuspy = $tempdata[4];
								$ddate = $tempdata[5];
								if($querylmtpy>$currentstatuspy){
											$tempreturndata = queryproxy($serverportpy, $status, $search);// if querylimit greater than 
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyfile);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
															
														}else{
														$pronumbertemp++;
														$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
														}
														
													}
											}else{
												$nocapcha = true;
												$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyfile,$currentstatuspy);
											}
								}else{
									if($statuspy == "ACTIVE" && $currentstatuspy == $querylmtpy){
											self::updatedeactive($proxyfile);
											$tempreturndata = queryproxy_new($serverportpy, $status, $search);// if querylimit greater than 
											
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyfile);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
															
														}else{
															$pronumbertemp++;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
														}
													}
											}else{
												$nocapcha = true;
												$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyfile,$currentstatuspy);
											}
									}else if($statuspy == "DEACTIVE" && $ddate != $cpdate){
										$statuspy == "ACTIVE";
										$currentstatuspy = 0;
										self::updateactive($proxyfile);
										self::updatecstatus($proxyfile,$currentstatuspy);
										$tempreturndata = queryproxy($serverportpy, $status, $search);// if querylimit greater than 
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyfile);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
															
														}else{
														$pronumbertemp++;
														$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
														}
													}
											}else{
												$nocapcha = true;
												$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyfile,$currentstatuspy);
											}
									}else{
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
															
														}else{
														$pronumbertemp++;
														$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
														}
													}
									}
								}
								
									
							}
							return $tempreturndata;
						}
					
					
					
					//======================================================================================================
						
			}else{
				
					$proxyfile = "../proxy/server-".$pronumbertemp.".inf";
					$nocapcha = false;
					$ctr = $noofserver;
					
					//=====================================================================================================
						if(!file_exists($proxyfile)){
							return "^*Please Create Proxy File Using Supervisor Account^*";
						}else{
							while(!$nocapcha){ // Do Till Capatcha or End of query
								$tempdata = self :: getproxyfilearray($proxyfile);
								
								$fhrdatapy = explode('|', $fhr);
								$querylmtpy = $tempdata[0];
								$noofserverpy = $tempdata[1];
								$serverportpy = $tempdata[2];
								$currentstatuspy = $fhrdata[3];
								$statuspy = $tempdata[4];
								$ddate = $tempdata[5];
								if($querylmtpy>$currentstatuspy){
											$tempreturndata = queryproxy_new($serverportpy, $status, $search);// if querylimit greater than 
											
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyfile);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
															
														}else{
														$pronumbertemp++;
														$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
														}
														
													}
											}else{
												$nocapcha = true;
												$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyfile,$currentstatuspy);
											}
								}else{
									if($statuspy == "ACTIVE" && $currentstatuspy == $querylmtpy){
											self::updatedeactive($proxyfile);
											$tempreturndata = queryproxy($serverportpy, $status, $search);// if querylimit greater than 
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyfile);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
															
														}else{
															$pronumbertemp++;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
														}
													}
											}else{
												$nocapcha = true;
												$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyfile,$currentstatuspy);
											}
									}else if($statuspy == "DEACTIVE" && $ddate != $cpdate){
										$statuspy == "ACTIVE";
										$currentstatuspy = 0;
										self::updateactive($proxyfile);
										self::updatecstatus($proxyfile,$currentstatuspy);
										$tempreturndata = queryproxy($serverportpy, $status, $search);// if querylimit greater than 
											if(self::checkcap($tempreturndata)){ // check if capatcha
												self::updatedeactive($proxyfile);
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
															
														}else{
														$pronumbertemp++;
														$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
														}
													}
											}else{
												$nocapcha = true;
												$ctr--;
												$currentstatuspy++;
												self::updatecstatus($proxyfile,$currentstatuspy);
											}
									}else{
												$ctr--;
												$nocapcha = false;
													if($ctr==0){
														$nocapcha = true;
													}else{
														if($pronumbertemp == $noofserverpy){
															$pronumbertemp = 1;
															$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
															
														}else{
														$pronumbertemp++;
														$proxyfile = "../proxy/server-".$pronumbertemp.".inf";//update proxy file
														}
													}
									}
								}
								
									
							}
							return $tempreturndata;
						}	
			}


	}
	
}

	public static function updatedeactive($datafileproxy){
		date_default_timezone_set("America/New_York");
			$date = date("Y-m-d");
			$fhRD = fopen($datafileproxy, 'r') or die("Failed to read file"); 
			$fhr = fgets($fhRD);
			fclose($fh);
			$fhrdatapy = explode('|', $fhr);
			$querylmtpy = $fhrdata[0];
			$noofserverpy = $fhrdata[1];
			$serverportpy = $fhrdata[2];
			$currentstatuspy = $fhrdata[3];
			$statuspy = "DEACTIVE";
			$fhW = fopen($datafileproxy, 'w') or die("Failed to read file"); 
			$txt2 = $querylmtpy."|".$noofserverpy."|".$serverportpy."|".$querylmtpy."|".$statuspy."|".$date;
			fwrite($fhW, $txt2);
			fclose($fh);
	}
	public static function updateactive($datafileproxy){
		date_default_timezone_set("America/New_York");
			$date = date("Y-m-d");
			$fhRD = fopen($datafileproxy, 'r') or die("Failed to read file"); 
			$fhr = fgets($fhRD);
			fclose($fh);
			$fhrdatapy = explode('|', $fhr);
			$querylmtpy = $fhrdata[0];
			$noofserverpy = $fhrdata[1];
			$serverportpy = $fhrdata[2];
			$currentstatuspy = 0;
			$statuspy = "ACTIVE";
			$fhW = fopen($datafileproxy, 'w') or die("Failed to read file"); 
			$txt2 = $querylmtpy."|".$noofserverpy."|".$serverportpy."|".$currentstatuspy."|".$statuspy."|".$date;
			fwrite($fhW, $txt2);
			fclose($fh);
	}
	public static function updatecstatus($datafileproxy, $cstatuspy){
		$fhRD = fopen($datafileproxy, 'r') or die("Failed to read file"); 
		$fhr = fgets($fhRD);
		fclose($fh);
		$fhrdatapy = explode('|', $fhr);
		$querylmtpy = $fhrdata[0];
		$noofserverpy = $fhrdata[1];
		$serverportpy = $fhrdata[2];
		$statuspy = $fhrdata[4];
		$ddate = $fhrdata[5];
		$fhW = fopen($datafileproxy, 'w') or die("Failed to read file"); 
		$txt2 = $querylmtpy."|".$noofserverpy."|".$serverportpy."|".$cstatuspy."|".$statuspy."|".$ddate;
		fwrite($fhW, $txt2);
		fclose($fh);
		
	}
		
	public static function checkcap($data){
		if(stristr($data,"302 Moved")){
			return $cap = true;							
		}else{
			return $cap = false;	
		}
	}
?>