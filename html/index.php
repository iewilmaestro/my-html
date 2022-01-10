<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>iewil | Dashboard</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div id="header">
		<ul>
			<li style="color: white;font-size: 25px;font-weight: bold"><marquee direction="right">watch the video below to get the key</marquee>Menu &raquo;</li>
			<li><a href="">Dashboard</a></li>
			<li><a href="List/list.php">List</a></li>
			<li><a href="About/">About</a></li>
		</ul>
	</div>

	<div id="content">
	    <br>
			<!-- 1. The <iframe> (and video player) -->
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
          			height: '400',
          			width: '640',
          			videoId: '<?php $data=["ozg0pQz3ndM","ecA0wT6Epy4","ecA0wT6Epy4","3e8gmiL2UQA"];echo $data[array_rand($data)];?>',
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
          			setTimeout(stopVideo, 1000);
          			done = true;
        		}
      		}
      		function stopVideo() {
        	//player.stopVideo();
        		document.getElementById('play').innerHTML = '<a ><h1><?php
                if(isset($_SESSION["id"])){
                    echo "Password ➣ ".md5($_SESSION["id"]);
                    session_destroy();
                }else{
                    echo "SESSION EXPIRED";
                }
                ?></h1></a>';
      		}
    	</script>
    </div>
	<div id="footer">
    	Copyright &copy; iewil
	</div>
</body>
</html>
