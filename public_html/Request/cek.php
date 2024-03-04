<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | Request</title>
	<link rel="stylesheet" href="../asset/css/style.css">
</head>
<?php
include("../asset/php/functions.php");
include("spreedsheet_reader.php");
?>
<body>
    <?=hd();?>
    <div class="content">
        <input type='text' id='input' onkeyup='searchTable()' placeholder="Cari.. ">
        <div class="list">
            <table id="list">
                <thead>
                    <tr>
            			<th>No</th>
            			<th>Time</th>
            			<th>Kontak</th>
                        <th>Link</th>
                        <th>Message</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $newArray as $a => $row): 
                    ?>
                    <tr>
                        <td><?=$a+1;?></td>
                        <td><?=$row["Time"];?></td>
                        <td><?=$row["Kontak"];?></td>
                        <td><a href="<?=cuan($row["Link"]);?>" target='_blank'><?=$row["Link"];?></a></td>
                        <td><?=$row["Message"];?></td>
                        <?php
                        if($row["Status"]=="done"){
                            ?><td id="online"><?=$row["Status"];?></td>
                            <?php
                        }else{
                            ?><td  id="offline"><?=$row["Status"];?></td>
                            <?php
                        }
                        ?>
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