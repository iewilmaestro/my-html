<?php
date_default_timezone_set("UTC");
session_start();
if($_GET['k'] == base64_encode(date("dmy"))){
    $_SESSION['d'] = base64_encode(date("dmy"));
}
header("Location: index.php");
?>
