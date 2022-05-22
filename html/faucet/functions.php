<?php

function Curl($u, $h = 0, $p = 0, $m = 0,$c = 0,$x = 0) {//url,header,post,proxy
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $u);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_COOKIE,TRUE);
	if($p) {
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $p);
	}
	if($h) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	}
	if($m) {
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $m);
	}
	if($x) {
		curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
		curl_setopt($ch, CURLOPT_PROXY, $x);
	}
	curl_setopt($ch, CURLOPT_HEADER, true);
	$r = curl_exec($ch);
	$c = curl_getinfo($ch);
	if(!$c) return "Curl Error : ".curl_error($ch); else{
		$hd = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		$bd = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		curl_close($ch);
		return array($hd,$bd);
	}
}

function CheckBalance($apikey){
    $url    = "https://faucetpay.io/api/v1/getbalance";
    $data   = [
        "api_key"   =>$apikey,
        "currency"  =>"TRX"
    ];
    return json_decode(curl($url,'',$data)[1],1);
}
function CheckAddress($apikey,$address){
    $url    = "https://faucetpay.io/api/v1/checkaddress";
    $data   = [
        "api_key"   => $apikey,
        "address"   => $address,
        "currency"  => "TRX"
    ];
    return json_decode(curl($url,'',$data)[1],1);
}
function SendPayment($apikey,$ammount,$address){
    $url    = "https://faucetpay.io/api/v1/send";
    $data   = [
        "api_key"   => $apikey,
        "amount"    => $ammount,
        "to"        => $address,
        "currency"  => "TRX"
    ];
    return json_decode(curl($url,'',$data)[1],1);
}
function PayOut($apikey){
    $url    = "https://faucetpay.io/api/v1/payouts";
    $data   = [
        "api_key"   =>$apikey,
        "currency"  =>"TRX",
        "count"     => 20
    ];
    return json_decode(curl($url,'',$data)[1],1);
}
function secret($secret,$respon){
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$respon;
    return json_decode(file_get_contents($url),1);
}
?>
