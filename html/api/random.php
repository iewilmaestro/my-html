<?php
error_reporting(0);
if($_GET["user"] !== "iewil" && $_GET["pass"] !== "maestro"){
    header("location: ../");
}

header('Content-Type: application/json');
function random($arr){
    return $arr[array_rand($arr)];
}
function email($str){
    $embed = random(["@gmail.com","@yahoo.com"]);
    $code = "1234567890";
    $x = substr(str_shuffle($code), 0, 4);
    return $str.$x.$embed;
}
$uavm = file("uavm");
$uagent = file("uagent");
$add = ["Australia","China"];
$address = random($add);
$gender = random(["male","female"]);
($gender=="male")? $title = "Mr":$title ="Mrs";

$data = json_decode(file_get_contents("data.json"),1);
$add = $data[$address];

$firstname = random($add[$gender]);
$lastname = random($add["last"]);


$city = random($add["city"]);
$state = random($add["state"]);
$street = random($add["street"]);


$return = 
    json_encode(
        [
            "user"  => [
                "gender"        => $gender,
                "title"         => $title,
                "first_name"    => $firstname,
                "last_name"     => $lastname,
                "email"         => email($firstname),
                "contact"       => ""
                ],
            "perangkat" => [
                    "uavm"      => $uavm[array_rand($uavm)],
                    "uagent"    => $uagent[array_rand($uagent)]
                ],
            "address"   => [
                    "address"   => $address,
                    "state"     => $state,
                    "city"      => $city,
                    "street"    => $street
                ]
        ]
    );

print $return;
