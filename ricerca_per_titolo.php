<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="it" xml:lang="it">

<head>
	<title>Ricerca per titolo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="ricerca_per_titolo_style.css">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text:600" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" media="handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" href="ricerca_per_titolo_style_small.css" >
</head>
<body>
	<h1>Fictional Pilgrimages</h1>
	<div id="path">
		Ti trovi in: ricerca per titolo
	</div>
	<div id="sidenav">
		<img id="logo" src="./img/logo.png" alt="Logo del sito" />
		<a href="index.php"><img id="home" src="./img/home.png" alt="" />Home</a>
		<a href="ricerca_per_localita.php"><img id="world" src="./img/world.png" alt="" />Ricerca per luogo</a>
		<a href="ricerca_per_titolo.php"><img id="titolo" src="./img/titolo.png" alt="" />Ricerca per titolo</a>
		<a href="#"><img id="utente" src="./img/utente.png" alt="" />Pannello utente</a>
	</div>
	<div id="body">
		<form action="/action_page.php">
			<select id="selezione_titolo"> <!--PHP elenco titoli-->
				<option value="">Titolo</option>
			</select>
			<input id="ricerca" type="submit" value="Ricerca">
		</form>
	</div>
	<div id="scroll">
		<img id="Top" onclick="topFunction()" src="./img/back_on_top.png" alt="" />
		<script>
		window.onscroll = function() {scrollFunction()};
		function scrollFunction() {
    		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        		document.getElementById("Top").style.display = "block";
    		} else {
        		document.getElementById("Top").style.display = "none";
    		}
		}
		function topFunction() {
    		document.body.scrollTop = 0;
    		document.documentElement.scrollTop = 0;
    	}
		</script>
	</div>
	<div id="footer">
		Copyright &copy; 2017 Fictional Pilgrimages | v0.032
	</div>
</body>
</html>
