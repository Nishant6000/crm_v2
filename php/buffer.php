<?php
$ch = curl_init();
$sURL="https://www.google.com/search?q=EMAILS+%22%40thetechnologyheadlines.com%22&oq=EMAILS+%22%40thetechnologyheadlines.com%22&aqs=chrome..69i57.862j0j15&sourceid=chrome&ie=UTF-8";
$sProxyUrl="104.144.3.253:20000";
$proxyauth="sbbloliv-202:h4ae5mht2yks";

curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; InfoPath.3; .NET4.0E; .NET CLR 1.1.4322)");


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
print_r($curl_scraped_page);
die;
echo "hi";
for($c=0;$c<40000;$c++)echo ' ';
sleep(2);
while(1){
	echo "hi";
for($c=0;$c<40000;$c++)echo ' ';
sleep(2);
}
?>