<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | Request</title>
	<link rel="stylesheet" href="../asset/css/style.css">
</head>
<?php
include("../asset/php/functions.php");
?>
<body>
    <?=hd();?>
    <div class="content">
        <script src="../asset/js/social.js"></script><script src="../asset/js/social.js"></script><script src="../asset/js/social.js"></script>
        <div class="form">
            <form method="post" action="https://script.google.com/macros/s/AKfycbzwmBc9jXG1YIwhpA0uds0dOO1anGl83NBekzbyMwuscGVUqbElFrJqCJQi9eGXv0BO/exec" name="request-form">
                <h4>Request form</h4>
                <input type="hidden" name="Time" value="<?=date('d/m/Y H:i:s');?>">
                <input type="text" name="Kontak" placeholder="Email/Telegram Contack" required><br>
                <input type="text" name="Link" placeholder="Url/Link Website" required><br>
    			<textarea name="Message" rows="7" placeholder="Your Message"></textarea><br>
    			<input type="submit" value="Submit" id="submit">
    		</form>
		</div>
		<script src="../asset/js/script.js"></script>
    </div>
    <?=ft();?>
</body>
</html>