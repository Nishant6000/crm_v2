<?php

echo $txt = ret();

function ret(){
$url = 'https://www.google.com/search?num=25&pws=0&q=EMAILS%20%22@dozuki.com%22&btn';
$proxy = '63.141.52.0:60000';
$proxyauth = 'optinprospects:mELb727ZnH';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
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
?>