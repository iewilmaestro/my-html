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
			<li style="color: white;font-size: 25px;font-weight: bold"><marquee direction="right">Welcome to Iewil Website</marquee>Menu &raquo;</li>
			<li><a href="">Dashboard</a></li>
			<li><a href="List">List</a></li>
			<li><a href="High">High Reward</a></li>
			<li><a href="About/">About</a></li>
		</ul>
	</div>
	<div id="content">
	    
	    <!-- Iklan -->
	    <a href="https://www.coinpayu.com/?r=iewilmaestro"><img title="Join coinpayu to earn!" alt="coinpayu" src="https://www.coinpayu.com/static/earners_banner/468X60.gif" align="top"></a>
	    <a target="_blank" href="https://cryptowin.io/ref/iewilmaestro"><img src="https://cryptowin.io/banners/468x60.png" width="468" height="60" align="top"></a><br>
	    
			<!-- 1. The <iframe> (and video player) -->
			<div id="player"></div>
			<!-- Iklan -->
			<a target="_blank" href="https://faucetpay.io/?r=1667280"><img src="http://iewil.my.id/gambar/fp.gif" width="295" height="405"></a>
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
          			setTimeout(stopVideo, 5000);
          			done = true;
        		}
      		}
      		function stopVideo() {
        	//player.stopVideo();
        		document.getElementById('play').innerHTML = '<a ><h1><?="Key Otomatis muncul jika menggunakan Script Ok!"?></h1></a>';
      		}
    	</script>
    	<!-- Iklan -->
    	<a target="_blank" href="https://autofaucet.org/r/iewilmaestro"><img src="https://autofaucet.org/public/landing/images/logo.svg" style="background-color:gray" width="468" height="60"></a>
    	<a href="https://autofaucet.dutchycorp.space/?r=iewilmaestro"  target="_blank" ><img src="https://dutchycorp.space/banners/Final-auto/V2/Coins/A/468x60.gif" alt= "DutchyCorp : Highest Paying AutoFaucet" width="468" height="60"><br></a>
    	<a target="_blank" href="https://autojunkie.fun/r/iewilmaestro"><img src="https://autojunkie.fun/img/logo.webp" style="background-color:black" width="468" height="60"></a>
    	<a target="_blank" href="https://dinntoks.com/?r=2863"><img src="https://dinntoks.com/assets/images/logo.png" style="background-color:gray" width="468" height="60"><br></a>
    	<a href="https://claimlite.club/?ref=1725" target="_blank"><img src="https://claimlite.club/promo/468x60.png" alt="CLAIMLITE COIN BEST FAUCET " border="0" /></a>
    	<a href="https://btcwin.online/?ref=19430" target="_blank"><img src="https://btcwin.online/promo/468x60.png" alt="Follow the rules and earn More!" border="0" /></a>
    </div>
	<div id="footer">
    	Copyright &copy; iewil
	</div>
</body>
</html>
