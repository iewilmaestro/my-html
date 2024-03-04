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
function num_rand($var_204){
	$var_338 = "abcdefghijklmnopqrstuvwqyz";
	$var_339 = "1234567890";
	$var_340= "ABCDEFGHIJKLMNOPQRSTUVWQYZ";
	$var_221 = str_split($var_339);
	$var_202 = "";while(true){
		$var_346 = array_rand($var_221);
		$var_202 .= $var_221[$var_346];
		if( strlen($var_202) == $var_204 ){ 
			return $var_202; 
		}
	}
}
function str_rand($var_204){
	$var_338 = "abcdefghijklmnopqrstuvwqyz";
	$var_339 = "1234567890";
	$var_340= "ABCDEFGHIJKLMNOPQRSTUVWQYZ";
	$var_221 = str_split($var_338.$var_339.$var_340);
	$var_202 = "";while(true){
		$var_346 = array_rand($var_221);
		$var_202 .= $var_221[$var_346];
		if( strlen($var_202) == $var_204 ){
			return $var_202;
		}
	}
}
function finger($csrf,$h){
	$rand = num_rand(6);
	$mdrand = md5($rand);
	$data = http_build_query(["op"=> "record_fingerprint","fingerprint"=> $mdrand,"csrf_token" => $csrf]);
	$r = curl("https://freebitco.in/cgi-bin/api.pl?$data",$h);
	if($r){
		return ["finger"=>$mdrand,"fingernum"=>$rand,"sheed"=>str_rand(16)];
	}
}
if(isset($src["IEWIL_OFFICIAL"]["finger"])){
        $csrf=$src["IEWIL_OFFICIAL"]["finger"][0];
        $h = $src["IEWIL_OFFICIAL"]["finger"][1];
        print json_encode(finger($csrf,$h));
        exit;
}
print "
IEWIL OFFICIAL
";