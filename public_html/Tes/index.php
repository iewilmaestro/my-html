<?php
session_start();
if($_SESSION['d']){
    $key = md5($_SESSION['d']);
}else{
    $key = "Wrong Key!";
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div id="player"></div>
			<div id="play"></div>
		<script>
      		var tag = document.createElement('script');
      		tag.src = "https://www.youtube.com/iframe_api";
      		var firstScriptTag = document.getElementsByTagName('script')[0];
      		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      		var player;
      		function onYouTubeIframeAPIReady() {
        		player = new YT.Player('player', {
          			height: '400',
          			width: '640',
          			videoId: '<?php $data=["286ua3Ngzok"];print $data[array_rand($data)];?>',
          			events: {
            			'onReady': onPlayerReady,
            			'onStateChange': onPlayerStateChange
          			}
        		});
      		}
      		function onPlayerReady(event) {
        		play();
        		document.getElementById('play').innerHTML = '<h1>watch video to get a key</h1>';
      		}
      		function play(){
        		player.playVideo();
      		}
      		var done = false;
      		function onPlayerStateChange(event) {
        		if (event.data == YT.PlayerState.PLAYING && !done) {
          			setTimeout(stopVideo, 30000);
          			done = true;
        		}
      		}
      		function stopVideo() {
        	//player.stopVideo();
        		document.getElementById('play').innerHTML = '<h1><?=$key;?></h1>';
      		}
    	</script>
    </div>
</body>
</html>