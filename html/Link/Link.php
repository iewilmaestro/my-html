<?php
if(isset($_GET["session"])){
    session_start();
    $_SESSION["id"]=$_GET["session"];
    header('Location: ../');
}else{
    echo "MAU NGAPAIN COK";
}
?>