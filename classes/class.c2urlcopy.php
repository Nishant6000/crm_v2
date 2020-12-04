<?php

class companytourl{

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
public static function curl_proxy($sURL,$sProxyUrl){
	$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $sURL); // Target URL
  curl_setopt($ch, CURLOPT_PROXY, $sProxyUrl); // Proxy IP:Port
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, FALSE);
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, "optinprospects:sj5fQa8eFh"); // Proxy Username/Password
  curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 600);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:5.0) Gecko/20100101 Firefox/5.0'); // some browser user agent string
  curl_setopt($ch, CURLOPT_REFERER, $sURL);
  $aHeaders = array( 'Expect:', 
  'Accept-Language: en-us; q=0.5,en; q=0.3', 
  'Accept: text/html,application/xhtml+xml,application/xml; q=0.9,*/*; q=0.8');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeaders);
  $result = utf8_decode(curl_exec($ch));
	return $result;
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
//==============================class To Route through Proxy
public static function fetch_google_result_via_proxy($search,$status,$no){
$search2 = urlencode($search);
$proxyfile = "../proxy/server-1.inf";
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
							$acstatus = $fhrdata[4];
							$date = $fhrdata[5];
								if($currentstatus<$querylmt){
									$currentstatus++;
									// save file
											updatecstatus($proxyfile, $currentstatus);
									if ($status == 1){
										$url = "https://www.google.com/search?hl=en&q=". $search2 ."&btnG=Google+Search";
										$resultg = self :: curl_proxy($url, $serverport);
										}elseif($status == 2){
										  $url = "https://www.google.com/search?num=25&pws=0&q=". $search2 ."&btnG=Google+Search";
										  $resultg = self :: curl_proxy($url, $serverport);
										}else{
										  $url = "https://www.google.com/search?num=100&pws=0&q=". $search2 ."&btnG=Google+Search";
										  $resultg = self :: curl_proxy($url, $serverport); 
										}
										//check if captacha. Once Captacha detected block 
										if(stristr($resultg,"302 Moved")){
											if($pronumbertemp=<$noofserver){
													updatedeactive($proxyfile);
													if($pronumbertemp<$noofserver){
														$pronumbertemp++;
														$proxyfile = "../proxy/server-".$pronumbertemp.".inf";
													}else{
														$pronumbertemp = 0;
														$proxyfile = "../proxy/server-".$pronumbertemp.".inf";
													}
													$nocapatcha = false;
													$ctr = $noofserver;
													while(!$nocapatcha){
													 $rcvdarray = getproxyfilearray($proxyfile);
													 $querylmttmp = $rcvdarray[0];
													$noofservertmp = $rcvdarray[1];
													$serverporttmp = $rcvdarray[2];
													$currentstatustmp = $rcvdarray[3];
													$acstatustmp = $rcvdarray[4];
													$datetmp = $rcvdarray[5];
														date_default_timezone_set("America/New_York");
														$datecur = date("Y-m-d");
														if ($acstatustmp == "DEACTIVE" && $datetmp == $datecur){
															$nocapatcha = false;
															$ctr--;
															if ($ctr==0){
																$nocapatcha = true;
															}else{
																$pronumbertemp++
																$proxyfile = "../proxy/server-".$pronumbertemp.".inf";
															}
															
														}else if($acstatustmp == "DEACTIVE" && $datetmp != $datecur){
															$acstatustmp = "ACTIVE"; 
															$datetmp = $datecur;
															
																if ($status == 1){
																$url = "https://www.google.com/search?hl=en&q=". $search2 ."&btnG=Google+Search";
																$resultg = self :: curl_proxy($url, $serverporttmp);
																}elseif($status == 2){
																  $url = "https://www.google.com/search?num=25&pws=0&q=". $search2 ."&btnG=Google+Search";
																  $resultg = self :: curl_proxy($url, $serverporttmp);
																}else{
																  $url = "https://www.google.com/search?num=100&pws=0&q=". $search2 ."&btnG=Google+Search";
																  $resultg = self :: curl_proxy($url, $serverporttmp); 
																}
																		if(stristr($resultg,"302 Moved")){
																			$ctr--;
																			$nocapatcha = false;
																			if($ctr==0){
																				$nocapatcha = true;
																			}else{
																				$pronumbertemp++
																				$proxyfile = "../proxy/server-".$pronumbertemp.".inf";
																			}
																			updatedeactive($proxyfile);
																			updatecstatus($proxyfile, 1);
																		}else{
																			$nocapatcha = true;
																			updatecstatus($proxyfile, 1);
																		}
																		
														}else{
															if($currentstatustmp=<$querylmt){
																	if ($status == 1){
																		$url = "https://www.google.com/search?hl=en&q=". $search2 ."&btnG=Google+Search";
																		$resultg = self :: curl_proxy($url, $serverporttmp);
																		}elseif($status == 2){
																		  $url = "https://www.google.com/search?num=25&pws=0&q=". $search2 ."&btnG=Google+Search";
																		  $resultg = self :: curl_proxy($url, $serverporttmp);
																		}else{
																		  $url = "https://www.google.com/search?num=100&pws=0&q=". $search2 ."&btnG=Google+Search";
																		  $resultg = self :: curl_proxy($url, $serverporttmp); 
																		}
																				if(stristr($resultg,"302 Moved")){
																					$ctr--;
																					$nocapatcha = false;
																					if($ctr==0){
																						$nocapatcha = true;
																					}else{
																						$pronumbertemp++
																						$proxyfile = "../proxy/server-".$pronumbertemp.".inf";
																					}
																					updatedeactive($proxyfile);
																					if($currentstatustmp==$querylmt){
																						$currentstatustmp = 0;
																					}else{
																						$currentstatustmp++;
																					}
																					updatecstatus($proxyfile, $currentstatustmp);
																				}else{
																					$nocapatcha = true;
																					if($currentstatustmp==$querylmt){
																						$currentstatustmp = 0;
																						updatedeactive($proxyfile);
																					}else{
																						$currentstatustmp++;
																					}
																		}			updatecstatus($proxyfile, $currentstatustmp);
																		
															}else{
																$currentstatustmp = 0;
																updatedeactive($proxyfile);
																$nocapatcha = false;
														}
													}
													
											}
											return $resultg;
											
										}else{
											return $resultg;
										}
										
								}
								else{
									$currentstatus = 0;
									//save file
									updatecstatus($proxyfile, $currentstatus);
									
											
									
										if ($status == 1){
										$url = "https://www.google.com/search?hl=en&q=". $search2 ."&btnG=Google+Search";
										$resultg = self :: curl_proxy($url, $serverport);
										}elseif($status == 2){
										  $url = "https://www.google.com/search?num=25&pws=0&q=". $search2 ."&btnG=Google+Search";
										  $resultg = self :: curl_proxy($url, $serverport);
										}else{
										  $url = "https://www.google.com/search?num=100&pws=0&q=". $search2 ."&btnG=Google+Search";
										  $resultg = self :: curl_proxy($url, $serverport); 
										}
										// check for captacha
										return $resultg;
									
								}
							
							}
				
				//==========================================================================
						}
			}else{
						$proxyfile = "../proxy/server-".$pronumbertemp.".inf";
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
								if($currentstatus<$querylmt){
									$currentstatus++;
									// save file
											$fh = fopen($proxyfile, 'w') or die("Failed to read file"); 
											$txt2 = $querylmt."|".$noofserver."|".$serverport."|".$currentstatus;
											fwrite($fh, $txt2);
											fclose($fh);
									if ($status == 1){
										$url = "https://www.google.com/search?hl=en&q=". $search2 ."&btnG=Google+Search";
										$resultg = self :: curl_proxy($url, $serverport);
										}elseif($status == 2){
										  $url = "https://www.google.com/search?num=25&pws=0&q=". $search2 ."&btnG=Google+Search";
										  $resultg = self :: curl_proxy($url, $serverport);
										}else{
										  $url = "https://www.google.com/search?num=100&pws=0&q=". $search2 ."&btnG=Google+Search";
										  $resultg = self :: curl_proxy($url, $serverport); 
										}
										return $resultg;
								}
								else{
									$currentstatus = 0;
									//save file
									$fh = fopen($proxyfile, 'w') or die("Failed to read file"); 
											$txt2 = $querylmt."|".$noofserver."|".$serverport."|".$currentstatus;
											fwrite($fh, $txt2);
											fclose($fh);
									
										if ($status == 1){
										$url = "https://www.google.com/search?hl=en&q=". $search2 ."&btnG=Google+Search";
										$resultg = self :: curl_proxy($url, $serverport);
										}elseif($status == 2){
										  $url = "https://www.google.com/search?num=25&pws=0&q=". $search2 ."&btnG=Google+Search";
										  $resultg = self :: curl_proxy($url, $serverport);
										}else{
										  $url = "https://www.google.com/search?num=100&pws=0&q=". $search2 ."&btnG=Google+Search";
										  $resultg = self :: curl_proxy($url, $serverport); 
										}
										return $resultg;
									
								}
							
							}
			}


	}
}
	function updatedeactive($datafileproxy){
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
	function updatecstatus($datafileproxy, $cstatuspy){
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
	function getproxyfilearray($proxyfile){
			$fhRD = fopen($proxyfile, 'r') or die("Failed to read file"); 
			$fhr = fgets($fhRD);
			fclose($fh);
			$fhrdatapy = explode('|', $fhr);
			return $fhrdatapy;
	}
}



//===========================================================
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