<?php
error_reporting(0);

function curl($url, $ua, $data = null) {
	$ch = curl_init();curl_setopt_array($ch, array(CURLOPT_URL => $url,CURLOPT_FOLLOWLOCATION => 1));
	if ($data) {
		curl_setopt_array($ch, array(CURLOPT_POST => 1,CURLOPT_POSTFIELDS => $data));
	}
	curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $ua,CURLOPT_SSL_VERIFYPEER => 1));
	curl_setopt_array($ch, array(CURLOPT_RETURNTRANSFER => 1));
	$run = curl_exec($ch);curl_close($ch);
	return $run;
}
function hcaptcha($apikey, $sitekey, $pageurl){
	$ua = ["host: ocr.captchaai.com","content-type: application/json/x-www-form-urlencoded"];
	$r = curl("http://ocr.captchaai.com/in.php?key=$apikey&method=hcaptcha&sitekey=$sitekey&pageurl=$pageurl",$ua);
	$id = explode('|',$r)[1];
	if(!$id){sleep(20);print $r;exit;}
	sleep(20);
	while(true){
		$r = curl("https://ocr.captchaai.com/res.php?key=$apikey&action=get&id=$id",$ua);
		if($r == "CAPCHA_NOT_READY"){
			sleep(5);continue;
		}
		return explode('|', $r)[1];
	}
}
function recaptchav2($apikey, $sitekey, $pageurl){
	$ua = ["host: ocr.captchaai.com","content-type: application/json/x-www-form-urlencoded"];
	$r = curl("https://ocr.captchaai.com/in.php?key=$apikey&method=userrecaptcha&googlekey=$sitekey&pageurl=$pageurl",$ua);
	$id = explode('|',$r)[1];
	if(!$id){
		sleep(20);
		print $r;exit;
	}
	sleep(20);
	while(true){
		$r = curl("https://ocr.captchaai.com/res.php?key=$apikey&action=get&id=$id",$ua);
		if($r == "CAPCHA_NOT_READY"){
			sleep(5);
			continue;
		}
		return explode('|', $r)[1];
	}
}
$src = json_decode(base64_decode($_POST["data"]),1);
if(isset($src["IEWIL_OFFICIAL"]["hcaptcha"])){
    $x = $src["IEWIL_OFFICIAL"]["hcaptcha"];
	$apikey = $x["apikey"];
	if(!$apikey){
	    $apikey = $api;
	}
    $sitekey = $x["sitekey"];
    $pageurl = $x["url"];
    print hcaptcha($apikey, $sitekey, $pageurl);
    exit;
}
if(isset($src["IEWIL_OFFICIAL"]["recaptcha"])){
    $x = $src["IEWIL_OFFICIAL"]["recaptcha"];
    $sitekey = $x["sitekey"];
    $pageurl = $x["url"];
    print recaptchav2($apikey, $sitekey, $pageurl);
    exit;
}
print "
IEWIL OFFICIAL
";