<?php
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
if(isset($src["IEWIL_OFFICIAL"]["faucet"])){
	$r = $src["IEWIL_OFFICIAL"]["faucet"];
	$csrf = explode('"',explode('id="token" value="',$r)[1])[0];
	if($csrf){
		$data["csrf"] = $csrf;
	}
	$token = explode('"',explode('name="token" value="',$r)[1])[0];
	if($token){
		$data["token"] = $token;
	}
	$tmr = explode(" -",explode('var wait = ',$r)[1])[0];
	if($tmr){
		$data["timer"] = $tmr;
	}
	$sitekey = explode('">',explode('<div class="g-recaptcha" data-sitekey="',$r)[1])[0];
	if($sitekey){
		$data["sitekey_rv2"] = $sitekey;
	}
	$wallet = explode('"',explode('name="wallet" class="form-control" value="',$r)[1])[0];
	if($wallet){
		$data["wallet"] = $wallet;
	}
	print json_encode($data);
	exit;
}
if(isset($src["IEWIL_OFFICIAL"]["hcaptcha"])){
    $x = $src["IEWIL_OFFICIAL"]["hcaptcha"];
	$apikey = $x["apikey"];
    $sitekey = $x["sitekey"];
    $pageurl = $x["url"];
    print hcaptcha($apikey, $sitekey, $pageurl);
    exit;
}
if(isset($src["IEWIL_OFFICIAL"]["recaptcha"])){
    $x = $src["IEWIL_OFFICIAL"]["recaptcha"];
	$apikey = $x["apikey"];
    $sitekey = $x["sitekey"];
    $pageurl = $x["url"];
    print recaptchav2($apikey, $sitekey, $pageurl);
    exit;
}