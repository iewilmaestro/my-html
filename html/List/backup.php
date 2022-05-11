<?php 
require "functions.php";
$list = query("SELECT * FROM List ORDER BY NamaSitus ASC");
print_r(json_encode($list));
