<?php
if(!isset($_GET["id"]) ||
	isset($_GET["key"]) != md5(time())){
		header('Location: list.php');
		exit;
	}
include("database.php");
$id=$_GET["id"];
if($data[$id]["payment"]=="Faucetpay"){
    $payment="https://faucetpay.io/?r=1667280";
}elseif($data[$id]["payment"]=="ExpressCrypto"){
    $payment="https://bit.ly/ExpressCrypto57";
}else{
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | Detail</title>
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<div id="header">
		<ul>
			<li style="color: white;font-size: 25px;font-weight: bold"><marquee direction="right">watch the video below to get the key</marquee>Menu &raquo;</li>
			<li><a href="../">Dashboard</a></li>
			<li><a href="list.php">List</a></li>
			<li><a href="../About">About</a></li>
		</ul>
	</div>

	<div id="content">
	    <br>
		<ul>
		    <li><a>Site Name ➣ <?= $data[$id]["title"]; ?></a></li>
		    <li><a href="<?= $data[$id]["site"]; ?>">Register Now!</a></li>
		    <li>Script ➣ <a href="<?= $data[$id]["script"]; ?>">Download</a></li>
		    <li>Link Tutor ➣ <a href="<?= $data[$id]["tutor"]; ?>">View</a></li>
		    <li>Payment ➣ <a href="<?= $payment; ?>"><?= $data[$id]["payment"]; ?></a></li>
			<li>Last Update ➣ <?= $data[$id]["waktu"]; ?></li>
		</ul>
    </div>
	<div id="footer">
    	Copyright &copy; iewil
	</div>
</body>
</html>