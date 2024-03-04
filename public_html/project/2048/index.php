<?php
date_default_timezone_set("Asia/Jakarta");
function curl($url, $post = 0, $httpheader = 0, $proxy = 0){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_COOKIE,TRUE);
    if($post){
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if($httpheader){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    }
    if($proxy){
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    }
    curl_setopt($ch, CURLOPT_HEADER, true);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch);
    if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
        $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        curl_close($ch);
        return array($header, $body);
    }
}
function dec_lisensi($device,$lisensi){
    $new_lisensi = md5(
        json_encode(
            [
                $device,"active"
            ]
        )
    );
    if($lisensi == $new_lisensi){
        return 0;
    }else{
        _alert("dasar anak babi ngapain ke sini kau deck");
        exit;
    }
}
function _alert($msg){
    print json_encode(
        [
            "status" => 404,
            "msg" => $msg
        ]
    );
}

//modul
function mctime(){
	return round(microtime(true) * 1000);
}
function enc($message){
	$ts = round(microtime(true) * 1000);
	$secret= b"\xa1'\x85j\t@3r\xc1I\xed\xb1\xd5b~\xf4";
	$cipher = "AES-128-ECB";
	$option = 0;
	$encrypted =  openssl_encrypt($message,$cipher,$secret,$option);
	$binary = base64_decode($encrypted);
	$hex = bin2hex($binary);
	return $hex;
}
function auth($length) {
    $characters = '|=<>};;;;}}~><>{}><~~||:;0123456789abcdefghijklmnopqrstuvwxyz:{|=<>};;;;}}~><>{}><~~||:;';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//givy
function loginEstablished($device){
	$ua=["language: English","currency: USD","version: 2.5","packageName: com.givvy2048","Content-Type: application/json; charset=utf-8","Host: givvy-2048.herokuapp.com","Connection: Keep-Alive","User-Agent: okhttp/5.0.0-alpha.2",];
	$datt=json_encode(["deviceId" => $device,"versionName" => "2.5","OS" => "31","language" => "EN","currency" => "USD","waitForApprovel" => true,"isWithBranch" => false,"verts" => mctime()]);
	return curl('https://givvy-2048.herokuapp.com/loginEstablished',json_encode(["verificationCode" => enc($datt)]),$ua)[1];
}
function getUser($user,$ua){
	$datt=json_encode(["userId" => $user,"verts" => mctime()]);
	return curl('https://givvy-2048.herokuapp.com/getUser',json_encode(["verificationCode" => enc($datt)]),$ua)[1];
}
function game($user,$tipe,$score,$ua){
	//stat
	$datt=json_encode(["userId" => $user,"typeOfGame" => $tipe,"verts" => mctime()]);
	$r = json_decode(curl('https://givvy-2048.herokuapp.com/startNewGame',json_encode(["verificationCode" => enc($datt)]),$ua)[1],true);
	$id=$r['result']['bet']['_id'];
	$time=$r['result']['bet']['time'];
	
	//progres
	$mil="8192";
	$datt=json_encode(["userId" => $user,"betId" => $id,"milestone" => $mil,"score" => $score,"board" => "The board for the milestone $mil:\nnull, null, 2, 4, \nnull, null, 16, 8, \n2, null, 4, $mil, \n2, 8, 4, 8, ","verts" => mctime()]);
	curl('https://givvy-2048.herokuapp.com/saveGameProgress',json_encode(["verificationCode" => enc($datt)]),$ua);
	
	//finish
	$datt=json_encode(["userId" => $user,"betId"  => $id,"score" => $score,"time" => $time,"verts" => mctime()]);
	$r = json_decode(curl('https://givvy-2048.herokuapp.com/finishGame',json_encode(["verificationCode" => enc($datt)]),$ua)[1],1);
	
	$des = [1=>"Highest Score",2=>"3 min High",3=>"Fastest Player"];
	return json_encode(
	[
	"TypeGame"=> $des[$tipe],
	"score"=>$r["result"]["bet"]["score"]
	]
);
}
//src dari data post
$src = json_decode(base64_decode($_POST["data"]),1);

//cek lisensi
if(isset($src["cek_lisensi"])){
    $device = $src["cek_lisensi"]["device"];
    $en = md5($device);
    $r = file_get_contents("https://raw.githubusercontent.com/iewilmaestro/GudangDuit/main/Lisensi");
    $list = explode("\n",$r);
    if(in_array($en,$list)){
        $new_lisensi = md5(
            json_encode(
                [
                    $device,"active"
                ]
            )
        );
        print json_encode(
            [
                "status"        => "active",
                "new_lisensi"   => $new_lisensi
            ]
        );
        exit;
    }else{
        print json_encode(
            [
                "status"    => "non_active",
                "msg"       => "contack me on telegram @Jim_dzalroza"
            ]
        );
        exit;
    }
}
if(isset($src["gas"])){
    $device = $src["gas"]["device"];
    $lisensi = $src["gas"]["lisensi"];
    $r = dec_lisensi($device,$lisensi);
    print_r(loginEstablished($device));
    exit;
}
if(isset($src["auth"])){
    $device = $src["auth"]["device"];
    $lisensi = $src["auth"]["lisensi"];
    $r = dec_lisensi($device,$lisensi);
    print_r(auth(11));
    exit;
}
if(isset($src["getUser"])){
    $device = $src["getUser"]["device"];
    $lisensi = $src["getUser"]["lisensi"];
    $user = $src["getUser"]["user"];
    $ua = $src["getUser"]["ua"];
    $r = dec_lisensi($device,$lisensi);
    print_r(getUser($user,$ua));
    exit;
}
if(isset($src["game"])){
    $device = $src["game"]["device"];
    $lisensi = $src["game"]["lisensi"];
    $user = $src["game"]["user"];
    $tipe = $src["game"]["tipe"];
    $score = $src["game"]["score"];
    $ua = $src["game"]["ua"];
    $r = dec_lisensi($device,$lisensi);
    print_r(game($user,$tipe,$score,$ua));
    exit;
}
_alert("dasar anak babi ngapain ke sini kau deck");

