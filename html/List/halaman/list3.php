<?php 
require "../functions.php";
$x = 30;
$y = $x+15;
//cari
if( isset($_POST["cari"])) {
    $list = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | List</title>
	<link rel="stylesheet" href="../../style.css">
</head>

<body>
	<div id="header">
		<ul>
			<li style="color: white;font-size: 25px;font-weight: bold"><marquee direction="right">Welcome to Iewil Website</marquee>Menu &raquo;</li>
			<li><a href="../">Dashboard</a></li>
			<li><a href="../">List</a></li>
			<li><a href="../About">About</a></li>
        </ul>
	</div>
	<div id="content">
		<!--<h3>List Script</h3>-->
        <p style="font-family:verdana;color: red">------Disclaimer<br>
            Segala resiko penggunaan program ilegal bukan tanggung jawab Creator!
        </p>
        <form action="" method="post">
          <input type="text" name="keyword" autofocus placeholder="Cari apa?.." autocomplete="off">
          <button type="submit" name="cari">Cari</button>
        </form>
		 <table>
            <tr bgcolor="blue" style="color:white" text-align="center">
                <th style="width:20%">Site Name</th>
                <th style="width:20%">Link Register</th>
                <th style="width:20%">Link Script</th>
                <th style="width:20%">Link Tutor</th>
                <th style="width:20%">Status Script</th>
            </tr>
		    <?php foreach( $list as $a => $row):
		        $a += 1;
		        if($a < $x || $a > $y)continue;?>
                <tr>
                	<td><?=$row["NamaSitus"];?></td>
                	<td><a class="regist" href="<?=$row["LinkSitus"];?>" target='_blank'>Register Here!</a></td>
                	<td><a class="regist" href="<?=$row["LinkScript"];?>" target='_blank'><img src="https://cdn1.iconfinder.com/data/icons/hawcons/32/698392-icon-129-cloud-download-512.png" width="20"> Download</a></td>
                	<?php if($row["LinkVidio"]=="belum"){
                	  ?><td><a class="view"> Belom ada ya</a></td>
                	   <?php  
                	}else{
                	    ?><td><a class="view" href="<?=$row["LinkVidio"];?>" target='_blank'><img src="https://1.bp.blogspot.com/-oDuGyxpEgCs/XvQmhE3ZtaI/AAAAAAAAGPI/bBjIplPrxpoAwpcfvfZhlSuFg3PPXWuLgCK4BGAsYHg/w320-h180/youtube-logo-black.png" width="20"> View</a></td>
                	    <?php
                	}
                    if($row["Status"]=="online"){
                        ;?><td><p class="online">
                        <?="online";
                    }else{  
                        ;?></p><td><p class="offline">
                        <?=$row["Status"];
                    };?></p></td>
                </tr>
            <?php endforeach; ?>
        </table><br>
        <a class="page" href="../">1</a>
        <?php $a = 1; foreach($halaman as $hal):
            $a +=1;?>
            <a class="page" href="<?=$hal;?>"><?=$a?></a>
        <?php endforeach; ?>
    </div>
	<div id="footer">
    	Copyright &copy; iewil
	</div>
</body>
</html>
