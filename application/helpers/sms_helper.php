<?php
function sms($number,$msg)
{  
$url="http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=umravati&password=umravati@12312&msisdn=".$number."&sid=UMPLGK&msg=".urlencode($msg)."&fl=0&gwid=2";
	
//$url="http://bulksms.gfinch.in/api/sendmsg.php?user=ramdoot&pass=ghazipur@123&sender=RAMDOT&phone=".$number."&text=".urlencode($msg)."&priority=ndnd&stype=normal";
	//$url = "http://mysms.sms7.biz/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authkey."&message=".urlencode($message)."&senderId=".$senderID."&routeId=1&mobileNos=".$number."&smsContentType=english";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$output=curl_exec($ch);
	curl_close($ch);
	return $output;
}

function checkBalSms()
{ 
$url = "http://sms.schoolerp-niktech.in/vendorsms/CheckBalance.aspx?user=umravati&password=umravati@123";

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$output=curl_exec($ch);
curl_close($ch);
return $output;
}

function getAlert($val){
	if($val=="success"){
		echo '<div class="alert alert-success">Success Fully Save Your Record !!!!</div>';
	}else{
		echo '<div class="alert alert-danger">Retry Afer Sone Times</div>';
		
	}
}