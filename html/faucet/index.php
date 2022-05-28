<?php
//print_r($_SERVER);die();
//apikey faucetpay
$apikey = "d291f6fe75c23ce9fd6cb6c5f8bb22bed24fe72b";

//secret from google recaptcha v2
$sitekey = "6LdCCvkfAAAAAI2kXvvu36bU4aw-gNRjaNb6XBqB";
$secret = "6LdCCvkfAAAAAOFD6BLOc-xK816b6ASwK1UyWQiv";

//reward per claim
$ammount = 10000;

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
    	   
    	   $con="data.json";
    	   $x[$_SERVER["REMOTE_ADDR"]];
    	   $x[$_SERVER["REMOTE_ADDR"]]["user-agent"] = $_SERVER["HTTP_USER_AGENT"];
    	   $x[$_SERVER["REMOTE_ADDR"]]["wallet"] = $_POST["address"];
    	   $x[$_SERVER["REMOTE_ADDR"]]["waktu"] = $_SERVER["REQUEST_TIME"];
    	   save($con,$x);
    	   
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
    .form-box {
        background: #EBEBEB;
        font-family: 'Gothic A1', serif;
        padding: 6em 0;
        text-align: center;
    }
    input {
        width: 25%;
        background: transparent;
        border: 0;
        border-bottom: 1px solid;
        padding: 1em 0 .8em;
        text-align: center;
        font-size: 18px;
        font-family: inherit;
        font-weight: 300;
        line-height: 1.5;
        color: inherit;
        outline: none;
        &::placeholder { 
            color: hsla(0, 0%, 100%, 0.5);
        }
    }
    button {
        all: unset;
        margin-top: 2.4em;
        background: transparent;
        border: 2px solid white;
        padding: 1em 4em;
        border-radius: 50px;
        cursor: pointer;
        display: inline-block;
        font-weight: 700;
        position: relative;
        transition: all 300ms ease;
    }

    button span {
        display: inline-block;
        transition: all 300ms ease;
        //z-index: 2;
    }
    button span:before, button span:after {
        content: "";
        display: block;
        position: absolute;
        transition: all 300ms ease;
        opacity: 0;
    }
    
    button span:before {
        height: 7px;
        width: 7px;
        background: transparent;
        border-right: 2px solid;
        border-top: 2px solid;
        right: 30px; top: 21px;
        transform: rotate(45deg);
    }
    button span:after {
        height: 7px;
        width: 7px;
        background: transparent;
        border-right: 2px solid;
        border-top: 2px solid;
        right: 30px; top: 21px;
        transform: rotate(45deg);
    }

button:hover span {
  padding-right: 25px;
}

button:hover span:after {
  opacity: 1;
  right: 0;
}
    placeholder { 
        color: hsla(0, 0%, 100%, 0.5);
    }
    </style>
</head>

<body>
	<div id="header">
		<ul>
			<li style="color: white;font-size: 25px;font-weight: bold;font-size: 15px;"><marquee direction="right">Welcome to Iewil Website</marquee>Menu &raquo;</li>
			<li><a href="../">Dashboard</a></li>
			<li><a href="">Faucet</a></li>
			<li><a href="../List">List</a></li>
			<li><a href="../About">About</a></li>
		</ul>
	</div>

	<div id="content">
	    <iframe data-aa="2014120" src="//ad.a-ads.com/2014120?size=728x90&background_color=cee5fa&title_color=1e7ef3" style="width:728px; height:90px; border:0px; padding:0; overflow:hidden; background-color: transparent;"></iframe>
	    <?php
    $r = CheckBalance($apikey)["balance"];
    ?>
    <?php $data = json_decode(file_get_contents('data.json'),1);?>
    
    <div class="form-box">
        <h2> Balance Tirex : <?=$r 
    ?></h2>
    <a href="https://autofaucet.dutchycorp.space/?r=iewilmaestro"  target="_blank"><img src="https://dutchycorp.space/banners/Final-auto/V2/Coins/A/160x600.gif" alt= "DutchyCorp : Highest Paying AutoFaucet" width="160" height="600"  align="left">  </a>
    <a href="https://autofaucet.dutchycorp.space/?r=iewilmaestro"  target="_blank"><img src="https://dutchycorp.space/banners/Final-auto/V2/Coins/A/160x600.gif" alt= "DutchyCorp : Highest Paying AutoFaucet" width="160" height="600"  align="left">  </a>
    <a href="https://autofaucet.dutchycorp.space/?r=iewilmaestro"  target="_blank"><img src="https://dutchycorp.space/banners/Final-auto/V2/Coins/A/160x600.gif" alt= "DutchyCorp : Highest Paying AutoFaucet" width="160" height="600"  align="right">  </a>
    <a href="https://autofaucet.dutchycorp.space/?r=iewilmaestro"  target="_blank"><img src="https://dutchycorp.space/banners/Final-auto/V2/Coins/A/160x600.gif" alt= "DutchyCorp : Highest Paying AutoFaucet" width="160" height="600"  align="right">  </a>
    
        <form action="" method="POST">
            <?php if($data[$_SERVER["REMOTE_ADDR"]]): ?>
                <input type="text" name="address" id="address" required value="<?= $data[$_SERVER["REMOTE_ADDR"]]["wallet"];?>">
            <?php else: ?>
                <input type="text" name="address" placeholder="Isi alamat Tirex">
            <?php endif; ?>
            <br><br>
                  <div class="g-recaptcha" data-sitekey="<?=$sitekey;?>" align="center"></div>
                  <br/>
                  
            <div style="color: white;background-color: #4475FA;width: 200px;heigh : 200px;margin: 50px;"></div><iframe data-aa='2014128' src='//ad.a-ads.com/2014128?size=336x280' style='width:336px; height:280px; border:0px; padding:0; overflow:hidden; background-color: transparent;'  align="center"></iframe><br>
            
            <?php if($data[$_SERVER["REMOTE_ADDR"]]["waktu"]): 
                if($_SERVER["REQUEST_TIME"] >= $data[$_SERVER["REMOTE_ADDR"]]["waktu"]+60): ?>
                    <button type="submit" name="claim"><span>Claim Tirex Now</span></button>
                <?php else: ?>
                    <div id="cooldown" style="font-family: sans-serif;
            font-size: 20px;
            color: red;
            "></div>
                <?php endif;
            else:?>
                <button type="submit" name="claim"><span>Claim Tirex Now</span></button>
            <?php endif; ?>
            
        </form>
    </div>
    
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        var url = "http://iewil.my.id/faucet"; // url tujuan
        var count = 60; // dalam detik
        function countDown() {
            if (count > 0) {
                count--;
                var waktu = count + 1;
                $('#cooldown').html('Claim setelah ' + waktu + ' detik');
                setTimeout("countDown()", 1000);
            } else {
                window.location.href = url;
            }
        }
        countDown();
    </script>
