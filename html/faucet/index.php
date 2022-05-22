<?php

//apikey faucetpay
$apikey = "d291f6fe75c23ce9fd6cb6c5f8bb22bed24fe72b";

//secret from google recaptcha v2
$sitekey = "6LdCCvkfAAAAAI2kXvvu36bU4aw-gNRjaNb6XBqB";
$secret = "6LdCCvkfAAAAAOFD6BLOc-xK816b6ASwK1UyWQiv";

//reward per claim
$ammount = 3000;

require "functions.php";

if(isset($_POST["address"]) && isset($_POST["g-recaptcha-response"])){
    $gp = $_POST["g-recaptcha-response"];
    $sec = secret($secret,$gp);
    if($sec["success"]){
        
        $address = $_POST["address"];
    
        $r = CheckAddress($apikey,$address);
        if($r["status"]==200){ 
            $r = SendPayment($apikey,$ammount,$address);
            if($r["balance"]<$ammount){
                echo "<script>
               alert('Saldo habis lapor ke mimin ya 😁');
               </script>";
            }
            
            echo "
                <script>
    	            alert('Success send $ammount Satoshi');
    	            document.location.href = 'index.php'
                </script>
    	   ";
        }else{ 
            echo "
    		    <script>
    			    alert('Input yang bener Tolol');
    			    document.location.href = 'index.php'
    		    </script>
    		   ";
        } 
    }else{
        echo "
            <script>
	            alert('Anjing');
	            document.location.href = 'index.php'
            </script>
	   ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | Faucet</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="stylesheet" href="../style.css">
    <style>
    button,input[type=submit] {
        font-family: sans-serif;
        font-size: 15px;
        background: #38D4FD;
        color: white;
        border: white 3px solid;
        border-radius: 5px;
        padding: 12px 20px;
        margin-top: 10px;
    }
    a {
        text-decoration: none;
    }
    button:hover, input[type=submit]:hover{
        opacity:0.9;
    }
    </style>
</head>

<body>
	<div id="header">
		<ul>
			<li style="color: white;font-size: 25px;font-weight: bold;font-size: 15px;"><marquee direction="right">Welcome to Iewil Website</marquee>Menu &raquo;</li>
			<li><a href="../">Dashboard</a></li>
			<li><a href="../List">List</a></li>
			<li><a href="../About">About</a></li>
		</ul>
	</div>

	<div id="content">
	    <?php
    $r = CheckBalance($apikey)["balance"];
    ?><div style="color: white;background-color: #4475FA;width: 200px;heigh : 200px;margin: 50px"> Balance Tirex : <?=$r 
    ?></div>
    <span style="color:#3233E3">FAUCETPAY ONLY</span>
    <form action="" method="POST">
        <input type="text" name="address" placeholder="Isi alamat Tirex">
        <br><br>
              <div class="g-recaptcha" data-sitekey="<?=$sitekey;?>"></div>
              <br/>
        <button type="submit" name="claim">Claim Tirex Now</button>
    </form>
    <br>
    <?php
    $r = PayOut($apikey);
    ?>
    <table>
            <tr bgcolor="blue" style="color:white" text-align="center">
                <th style="width:10%">Adress</th>
                <th style="width:10%">Ammount</th>
                <th style="width:10%">Date</th>
            </tr>
		    <?php foreach( $r["rewards"] as $row): ?>
                <tr>
                	<td><?=$row["to"];?></td>
                	<td><?=$row["amount"];?></td>
                    <td><?=$row["date"];?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    </div>
	<div id="footer">
    	Copyright &copy; iewil
	</div>
</body>
</html>
