<?php include("config.inc");?>
<!DOCTYPE html>
<html>
<head>
	<title>Aula Virtual - Principal</title>
	<meta charset="UTF-8">

	   

	<link rel="stylesheet" media="screen" type="text/css" href="../css/aula_estilo.css" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="../js/slides.min.jquery.js"></script>
<script>
	$(function(){
		$('#slides').slides({
			preload: true,
			preloadImage: '../imgs/loading.gif',
			play: 5000,
			pause: 2500,
			hoverPause: true
		});
	});
</script>                           
</head>
<body>