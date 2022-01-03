<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="surfe.pro" content="02f88cb55a1bd19b4db73b5284b46588">
	<meta charset="utf-8">
	<title>iewil | List</title>
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<div id="header">
		<ul>
			<li style="color: white;font-size: 25px;font-weight: bold"><marquee direction="right">watch the video below to get the key</marquee>Menu &raquo;</li>
			<li><a href="../">Dashboard</a></li>
			<li><a href="">List</a></li>
			<li><a href="../About">About</a></li>
		</ul>
	</div>

	<div id="content">
	    <br>
		<h3>List Script</h3>
		<ul>
		<?php include("database.php");
		for($x=0;$x<count($data);$x++): ?>
			<Li><a href="detail.php?id=<?= $x; ?>&key=<?= md5(time()); ?>"><?= $data[$x]["title"]; ?></a></Li>
		<?php endfor; ?>
		</ul>
    </div>
	<div id="footer">
    	Copyright &copy; iewil
	</div>
</body>
</html>
