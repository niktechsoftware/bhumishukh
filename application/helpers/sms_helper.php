<?php
function sms($number,$msg)
{ 
    
     $url = "http://mysms.sms7.biz/rest/services/sendSMS/sendGroupSms?AUTH_KEY=61892d5b4dcf374ebca4985663df0ba&message=".urlencode($msg)."&senderId=DEMOOS&routeId=1&mobileNos=".$number."&smsContentType=english";
 	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$output=curl_exec($ch);
	$rt=json_decode($output,true);
//echo $rt['response'];
	$dat =  $rt['response'];
	curl_close($ch);
return $dat;

	
}

function checkBalSms()
{ 
    $url = "http://mysms.sms7.biz/getBalance?userName=bhumishukh&password=Kanpur@12345";

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$output=curl_exec($ch);
	$rt=json_decode($output,true);

	$dat =  $rt[0]['routeBalance'];

curl_close($ch);
return $dat;

}

function getAlert($val){
	if($val=="success"){
		echo '<div class="alert alert-success">Success Fully Save Your Record !!!!</div>';
	}else{
		echo '<div class="alert alert-danger">Retry Afer Sone Times</div>';
		
	}
}