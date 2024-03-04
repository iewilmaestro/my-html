<?php
function save($data,$data_post){
    if(!file_exists($data)){
        file_put_contents($data,"[]");
    }
    $json=json_decode(file_get_contents($data),1);
    $arr=array_merge($json,$data_post);
    file_put_contents($data,json_encode($arr,JSON_PRETTY_PRINT));
}
$data = "conn.json";
if($_POST["title"] && $_POST["versi"] && $_POST["bot"]){
	$arr = [$_POST["title"]=>["status"=>"on","versi"=>$_POST["versi"],"bot"=>$_POST["bot"]]];
	save($data,$arr);
	echo "Success";
}else{
    echo " Gagal";
}