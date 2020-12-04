<?php 
 
function disguise_curl($url) 
{ 
	$curl = curl_init(); 

	// setup headers - used the same headers from Firefox version 2.0.0.6
	// below was split up because php.net said the line was too long. :/
	$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,"; 
	$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5"; 
	$header[] = "Cache-Control: max-age=0"; 
	$header[] = "Connection: keep-alive"; 
	$header[] = "Keep-Alive: 300"; 
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7"; 
	$header[] = "Accept-Language: en-us,en;q=0.5"; 
	$header[] = "Pragma: "; //browsers keep this blank. 

	curl_setopt($curl, CURLOPT_URL, $url); 
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3'); 
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
	curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com'); 
	curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate'); 
	curl_setopt($curl, CURLOPT_AUTOREFERER, true); 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($curl, CURLOPT_TIMEOUT, 10); 

	$html = curl_exec($curl); //execute the curl command 
	if (!$html) 
	{
		echo "cURL error number:" .curl_errno($ch);
		echo "cURL error:" . curl_error($ch);
		exit;
	}
  
	curl_close($curl); //close the connection 

	return $html; //and finally

}
function curl_proxy_test($url) 
{ 
	$curl = curl_init(); 

	// setup headers - used the same headers from Firefox version 2.0.0.6
	// below was split up because php.net said the line was too long. :/
$header = array();
$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,"; 
$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5"; 
$header[] = "Cache-Control: max-age=0"; 
$header[] = "Connection: keep-alive"; 
$header[] = "Keep-Alive: 300"; 
$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7"; 
$header[] = "Accept-Language: en-us,en;q=0.5"; 
$header[] = "Pragma: "; //browsers keep this blank. 
$header[] = 'Authorization: Token da6803a5f14bcfd962d32a8e4fed959428ca8b33';

	curl_setopt($curl, CURLOPT_URL, $url); 
	//curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3'); 
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
	$html = curl_exec($curl); //execute the curl command 
	if (!$html) 
	{
		//echo "cURL error number:" .curl_errno($ch);
		//echo "cURL error:" . curl_error($ch);
		//exit;
	}
  
	curl_close($curl); //close the connection 

	return $html; //and finally

}
$alfa = curl_proxy_test("https://proxy.webshare.io/api/proxy/list/");
$alfax = json_decode($alfa);
print_r($alfax->results);
die;
foreach ($alfax->results as $alf){
	echo $alf->username.":".$alf->password;
	echo "</br>";
	echo $alf->proxy_address.":".$alf->ports->http;
	echo "</br>";

}
 


echo $alfa = disguise_curl("https://www.olx.in/bengaluru_g4058803/cars_c84");
if(stristr($alfa,"Shanti Nagar")){
	echo "Success";
}else{
	echo "Crawl Failed";
}
die;
$no = 422;
$noofserver = 100;

if($no>$noofserver){ // if incoming request is greater than total no of servers available
		echo $pronumbertemp = $no;
		while($pronumbertemp>$noofserver){
			$pronumbertemp = $pronumbertemp - $noofserver;
		}
		
	}
echo "</br>";
echo $pronumbertemp;
die;
$proxyfile = "server-1.inf";
if(!file_exists($proxyfile)){
	echo "No File Exists";
}else{
	$fh = fopen($proxyfile, 'r') or die("Failed to read file"); 
	echo $fhr = fgets($fh);
	echo "</br>";
	fclose($fh);
	$fhrexplode = explode('|', $fhr);
	echo $fhrexplode[1];
	die;
	$fhrdata = count($fhrexplode)-1;
	$fhrdataalter = $fhrexplode[$fhrdata];
	$fhrdataalter = $fhrdataalter+1;
	for($i=0;$i<$fhrdata;$i++){
		
	}
	// write data 
	
	
}
die;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://api.oxylabs.io/v1/proxies/lists");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_USERPWD, 'optinprospects:sj5fQa8eFh');
echo $result = curl_exec($curl);
$result_array = json_decode($result, TRUE);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $result_array[0]['href']);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_USERPWD, 'optinprospects:sj5fQa8eFh');
$result = curl_exec($curl);
$result_array = json_decode($result, TRUE);
print_r($result_array);
die;

///////////////////////////////////////////////////
$sURL ="https://amazon.in";
echo $sProxyUrl = $result_array[2]['ip'].':'.$result_array[1]['port'];

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
  echo $result = utf8_decode(curl_exec($ch));

//////////////////////////////////////////////////
die;

?>
	