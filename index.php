<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
        'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='it' xml:lang='it'>

<head>
	<title>Fictional Pilgrimages</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<link href='https://fonts.googleapis.com/css?family=Crimson+Text:600' rel='stylesheet'> 
	<link rel='stylesheet' type='text/css' href='style.css' />
	<link rel='stylesheet' type='text/css' media='handheld, screen and (max-width:480px), only screen and (max-device-width:480px)' href='index_style_small.css' >
</head>
<body>
	<h1>Fictional Pilgrimages</h1>
	<div id='path'>
		Ti trovi in: Home
		<form method='get' action='registrazione_page.php'>
    	    <button type='submit'>Connettiti</button>
		</form>
	</div>
	<div id='sidenav'>
        <a href='#corpo' style='display: none'>Clicca per saltare il menu.</a>
		<img id='logo' src='./img/logo.png' alt='Logo del sito' />
		<ul id='menu'>
			<li class='selected'><img class='icon' src='./img/home.png' alt='' />Home</li>
            <a href='ricerca_per_localita.html'><li><img class='icon' src='./img/world.png' alt='' />Cerca luoghi</li></a>
            <a href='ricerca_per_titolo.html'><li><img class='icon' src='./img/titolo.png' alt='' />Cerca opere</li></a>
            <a href='#'><li><img class='icon' src='./img/utente.png' alt='' />Pannello utente</li></a>
		</ul>
	</div>
	<div id='corpo'>
		<h2>The journey starts here!</h2>
		<p id='descrizione'>Questo sito &egrave; stato creato nell'ambito del progetto di Tecnologie Web dell'anno accademico 2017/2018. Il sito si propone di associare i set di film, anime e serie televisive famosi con i rispettivi luoghi &quot;della vita di ogni giorno&quot; fornendo allo stesso tempo informazioni su di essi.</p>
		<a href='ricerca_per_localita.html' class='shiny-button'>
		<strong>Ricerca per luogo</strong>
		</a>
		<a href='ricerca_per_titolo.html' class='shiny-button2'>
		<strong>Ricerca per titolo</strong>
		</a>
		<h3>Top Searched</h3>
		<img src='./img/bar-cesaroni.jpg' alt='' />
		<p id='didascalia'>Bar &quot;Garbatella&quot; dalla serie televisiva &quot;I Cesaroni&quot;</p>
	</div>
	<div id='scroll'>
		<img id='Top' onclick='topFunction()' src='./img/back_on_top.png' alt='' />
		<script>
		window.onscroll = function() {scrollFunction()};
		function scrollFunction() {
    		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        		document.getElementById('Top').style.display = 'block';
    		} else {
        		document.getElementById('Top').style.display = 'none';
    		}
		}
		function topFunction() {
    		document.body.scrollTop = 0;
    		document.documentElement.scrollTop = 0;
    	}
		</script>
	<div id='footer'>
		Copyright &copy; 2017 Fictional Pilgrimages | v0.032
	</div>
</body>
</html>