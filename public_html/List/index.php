<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | List</title>
	<link rel="stylesheet" href="../asset/css/style.css">
</head>
<?php
include("../asset/php/functions.php");
$list = query("SELECT * FROM List ORDER BY Title ASC");
?>
<body>
    <?=hd();?>
    <div class="content">
        <script src="../asset/js/social.js"></script> <script src="../asset/js/social.js"></script> <script src="../asset/js/social.js"></script>
        <br><br>
        <input type='text' id='input' onkeyup='searchTable()' placeholder="Cari.. ">
        <div class="list">
            <table id="list">
                <thead>
                    <tr>
            			<th>No</th>
            			<!--th>Author</th-->
                        <th>Title</th>
                        <th>Status</th>
                        <th>Site</th>
                        <th>Register</th>
                        <th>Tutorial</th>
                        <th>Server 1</th>
                        <th>Server 2</th>
                        <th>Last Update</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $new_script = date('d-M-Y',strtotime('-3 days', strtotime(date('Y-m-d'))));
                    foreach( $list as $a => $row): ?>
                    <tr>
                        <td><?=$a+1;?></td>
                        <!--td><?=$row["Author"];?></td-->
                        <?php
                            if(strtotime(str_replace("/","-",$row["LastUpdate"])) > strtotime($new_script)){ ?>
                                <td style="color: black; background-color: rgb(61, 98, 235)"><strong><?=$row["Title"];?>-New</strong></td>
                            <?php 
                            }else{ ?>
                                <td><?=$row["Title"];?></td>
                            <?php 
                            }
                        if($row["Status"]=="Online"){
                            ?><td id="online"><?=$row["Status"];?></td>
                            <?php
                        }else{
                            ?><td  id="offline"><?=$row["Status"];?></td>
                            <?php
                        }
                        ?>
                        <td><a href="https://api-iewil.my.id/New.php?id=<?=$row["id"];?>">Cek</a></td>
                        <td><a href="<?=cuan($row["Link"]);?>" target='_blank'>Register Here!</a></td>
                        <?php
                        if($row["Youtube"] == "https://youtube.com/c/iewil" || !$row["Youtube"]){
                            ?>
                            <td>-</td>
                            <?php
                        }else{
                            ?><td><a href="<?=$row["Youtube"];?>" target='_blank'>View</a></td><?php
                        }
                        ?>
                        
                    	<td><a href="<?=cuan($row["Server 1"]);?>" target='_blank'>Server1</a></td>
                    	<?php
                        if(!$row["Server 2"]){
                            ?>
                            <td>-</td>
                            <?php
                        }else{
                            ?><td><a href="<?=cuan($row["Server 2"]);?>" target='_blank'>Server2</a></td><?php
                        }
                        ?>
                        <td><?=$row["LastUpdate"];?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?=ft();?>
</body>
<script src="../asset/js/script.js"></script>
</html>