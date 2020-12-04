<?php
//extract data from the post

//set POST variables
/*$url = 'http://180.151.253.114:8000/optinmailer/api/';
$fields = array(
            'username' => "annonymous",
            'queryid' => "annonymous-1",
			'companyname' => "Optin Prospects",
			'companyurl' => urlencode("http://optinprospects.us")
        );

//url-ify the data for the POST
$fields_string = http_build_query($fields);
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);

//execute post
echo $result = curl_exec($ch);
//$obj = json_decode($result, TRUE);
  
// Display the value of json object 

  
//echo $result;

//close connection
curl_close($ch);
*/
function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   //curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){return "Connection Failure";}
   curl_close($curl);
   return $result;
}
$fields = array(
            'username' => "annonymous",
            'queryid' => "annonymous-1",
			'companyname' => "Optin Prospects",
			'companyurl' => urlencode("http://optinprospects.us"));
echo $get_data = callAPI('POST', 'http://180.151.253.114:8000/optinmailer/api/', $fields);
$response = json_decode($get_data, TRUE);

//$errors = $response['response']['errors'];
//$data = $response['response']['data'][0];
?>