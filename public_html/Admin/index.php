<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | Login</title>
	<link rel="stylesheet" href="../asset/css/style.css">
</head>
<?php
include("../asset/php/functions.php");
?>
<body>
    <?=hd();?>
    <div class="content">
        <script src="../asset/js/social.js"></script><script src="../asset/js/social.js"></script><script src="../asset/js/social.js"></script>
        <p class="keterangan">Silahkan login</p>
        <div class="login">
    		<form action="cek_login.php" method="post">
    		    <label>Username</label>
    			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
     
    			<label>Password</label>
    			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
     
    			<input type="submit" class="tombol_login" value="LOGIN">
     
    			<br/>
    			<br/>
    			<center>
    			    <h4>Dont have Account?</h4>
    			    <a class="link" href="https://api-iewil.my.id/Admin/register.php">Register!</a>
    			</center>
    				<a class="link" href="https://api-iewil.my.id">Home</a>
    		</form>
		</div>
    </div>
    <?=ft();?>
</body>
</html>