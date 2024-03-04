<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | New</title>
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<?php
include("asset/php/functions.php");
$data = datax($_GET["id"])[0];
if(!$data){
    ?><img src="asset/img/sad.png"><br><br><h1>MAAF SCRIPT YANG ANDA CARI SUDAH TIDAK BISA DI GUNAKAN<h1><?php
    exit;
}
$yt = explode('youtu.be/',$data["Youtube"])[1];
?>
<body>
    <?=hd();?>
    <div class="content">
        <script src="asset/js/social.js"></script><script src="asset/js/social.js"></script><script src="asset/js/social.js"></script>
        <div class="new">
            <script src="asset/js/nativ.js"></script>
            <div id="container-3e3b1303639bf7e032ff5d7d1e081c9e" style="float:center"></div>
            <table id="kontent">
                <a href="https://beta.publishers.adsterra.com/referral/KRgXy8fbJA"><img align="right" height="500px" alt="banner" src="https://landings-cdn.adsterratech.com/referralBanners/gif/120x300_adsterra_reff.gif" /></a>
                <tr>
                    <th colspan="3"><?=$data["Title"];?></th>
                </tr>
                <tr>
                    <td rowspan="5">
                        <iframe width='560' height='315' src='https://www.youtube.com/embed/<?=$yt;?>' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?=$data["Status"];?></td>
                </tr>
                <tr>
                    <td>Register</td>
                    <td><a href='<?=cuan($data["Link"]);?>' target="_blank">Register Here!</a></td>
                </tr>
                <tr>
                    <td>Script</td>
                    <td>
                        <ul>
                            <li><a href='<?=cuan($data["Server 1"]);?>' target='_blank'>Download 1</a></li>
                            <li><a href='<?=cuan($data["Server 2"]);?>' target='_blank'>Download 2</a></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Last Update</td>
                    <td><?=$data["LastUpdate"];?></td>
                </tr>
            </table>
        </div>
        <br>
        <a href="https://autofaucet.dutchycorp.space/?r=iewilmaestro"  target="_blank" ><img src="https://dutchycorp.space/banners/Final-auto/V2/Coins/A/728x90.gif" alt= "DutchyCorp : Highest Paying AutoFaucet" width="728" height="90"><br>  </a>
        <br>
        
        <div class="modul">
            <h3>MODUL TERMUX </h3>
            <ul>
                <li>$ pkg update</li>
                <li>$ pkg upgrade</li>
                <li>$ pkg install php</li>
                <li>$ pkg install python</li>
                <li>$ pip install requests</li>
                <li>$ pip install telethon</li>
                <li>$ pip install iewil</li>
            </ul>
            <br>
            Cara install modul di termux <a href="https://www.youtube.com/watch?v=rmlDzEnuWAo">Tonton</a>
        </div>
    </div>
    <?=ft();?>
</body>
</html>