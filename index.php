﻿<?php
  // Подключаем счётчик
  include "counter/count.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Portfolio</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	
	<script src="js/swfobject.js" type="text/javascript"></script>
	<script type="text/javascript">
		var flashvars = {	};
		var params = {
			menu: "false",
			scale: "noScale",
			allowFullscreen: "true",
			allowScriptAccess: "always",
			bgcolor: "#FFFFFF"
		};
		var swfWidth = '980';
		var swfHeight = '780';
		var playerVersion = "10.0.0";
		var attributes = {
			id:"My portfolio"
		};
		swfobject.embedSWF("LVGs_portfolio.swf", "altContent", swfWidth, swfHeight, playerVersion, "expressInstall.swf", flashvars, params, attributes);
	</script>
	<style type="text/css" media="screen">
			body { margin:0; text-align:center; }
			div#content { text-align:left; }
			object#content { display:inline; }
	</style>      
</head>
<body>
	<div id="altContent">
		<h1>My portfolio</h1>
		<p><a href="http://www.adobe.com/go/getflashplayer"><img 
			src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" 
			alt="Get Adobe Flash player" /></a></p>
	</div>
</body>
</html>