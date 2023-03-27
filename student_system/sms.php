<?php
//post
$url="https://www.way2sms.com/api/v1/sendCampaign";
$message = urlencode("Student was absent");// urlencode your message
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=JE4ZJCIFWT1H0N7HB9B7JL9ZI637QPA2&secret=LZYHT0IEMXDIM2R0&usetype=stage&phone=9521174640&senderid=nsoni3374@gmail.com&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
echo $result;
curl_close($curl);

?>