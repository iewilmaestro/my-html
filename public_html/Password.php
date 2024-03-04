<?php
date_default_timezone_set('Asia/Jakarta');
if($_GET["ip"]){
print md5($_GET["ip"].date("d/m/Y"));
}