<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | Gabut</title>
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
<?php
function balxx($apikey){
    $x = json_decode(file_get_contents('http://api.multibot.in/res.php?action=userinfo&key='.$apikey),1);
    if(!$x){
        return "Saldo Apikey Habis";
    }
    	return $x["balance"];
}

$data = json_decode(file_get_contents("free.json"),1);
if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $key = "Apikey: ".$data[$_POST["id"]];
    $bal = "Balance: ".balxx($data[$_POST["id"]]);
}else{
    $key = "ID nya kok salah sih 😊";
    $bal = "";
}

?>
    <div class="content">
        <div id="player"></div>
			<!-- The Play-Link will appear in that div -->
			<div id="play"></div>
			
		<script>
      		// 2. This code loads the IFrame Player API code asynchronously.
      		var tag = document.createElement('script');
      		tag.src = "https://www.youtube.com/iframe_api";
      		var firstScriptTag = document.getElementsByTagName('script')[0];
      		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      		//https://www.youtube.com/watch?v\u003d
      		// 3. This function creates an <iframe> (and YouTube player)
      		var player;
      		function onYouTubeIframeAPIReady() {
        		player = new YT.Player('player', {
          			height: '360px',
          			width: '640px',
          			videoId: '<?php $data=["286ua3Ngzok","gv2kVm2QECc"];echo $data[array_rand($data)];?>',
          			events: {
            			'onReady': onPlayerReady,
            			'onStateChange': onPlayerStateChange
          			}
        		});
      		}
      		// 4. call this function when the video player is ready.
      		function onPlayerReady(event) {
        		play();
        		document.getElementById('play').innerHTML = '<a ><h1>watch video to get a key</h1></a>';
      		}
      		function play(){
        		player.playVideo();
      		}
      		// 5. The API calls this function when the player's state changes.
      		//    The function indicates that when playing a video (state=1),
      		//    the player should play for six seconds and then stop.
      		var done = false;
      		function onPlayerStateChange(event) {
        		if (event.data == YT.PlayerState.PLAYING && !done) {
          			setTimeout(stopVideo, 30000);
          			done = true;
        		}
      		}
      		function stopVideo() {
        	//player.stopVideo();
        		document.getElementById('play').innerHTML = '<a ><h1 style="background-color:white;color:black"><?=$key."<br>".$bal;?></h1></a>';
      		}
    	</script>
    </div>
</body>
</html>