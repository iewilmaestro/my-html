<?php
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
function Visionx($img){
	$head=["content-type: application/json"];
	while(true){
		$data=json_encode(["requests"=>[["image"=>["content"=>$img],"features"=>[["type"=>"TEXT_DETECTION"]]]]]);
		$result= Curl("https://vision.googleapis.com/v1/images:annotate?key=AIzaSyC3y-Em42htSB8UEZPqptJ78rlvL58_h6Y",$head,$data);
		$cap = explode('",',explode('"description": "',$result)[1])[0];
		if($cap == "Request a higher quota limit.")continue;
		if(!$cap){
		    return "Captcha buriq";
		}
		if(strlen($cap) > 10)return "Captcha buriq";
		if(explode("+",$cap)[1]){
			$awal = trim(explode("+",$cap)[0]);
			$akhir = trim(explode("+",$cap)[1]);
			if(is_numeric($awal) && is_numeric($akhir)){
				$cap = $awal+$akhir;
			}else{
				return "Captcha buriq";
			}
		}
		if(explode(" ",$cap)[1]){
			$awal = trim(explode(" ",$cap)[0]);
			$akhir = trim(explode(" ",$cap)[1]);
			if(is_numeric($awal) && is_numeric($akhir)){
				$cap = $awal+$akhir;
			}else{
				$cap = trim(str_replace(' ','',$cap));
			}
		}
		if(explode('\n',$cap)[1]){
			$awal = trim(explode('\n',$cap)[0]);
			$akhir = trim(explode('\n',$cap)[1]);
			if(is_numeric($awal) && is_numeric($akhir)){
				$cap = $awal+$akhir;
			}else{
				$cap = str_replace('\n','',$cap);
			}
		}
		return $cap;
	}
}

$src = json_decode(base64_decode($_POST["data"]),1);
//$content=base64_encode($img);
if(isset($src["IEWIL_OFFICIAL"]["imageCaptcha"])){
    $x = $src["IEWIL_OFFICIAL"]["imageCaptcha"];
	$content = $x["content"];
    $type = $x["type"];
    print Visionx($content);
    exit;
}






