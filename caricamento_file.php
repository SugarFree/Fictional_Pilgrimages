<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='it' xml:lang='it'>

<head>
	<title>Fictional Pilgrimages</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<link href='https://fonts.googleapis.com/css?family=Crimson+Text:600' rel='stylesheet'> 
	<link rel='stylesheet' type='text/css' href='index_style.css' />
	<link rel='stylesheet' type='text/css' media='handheld, screen and (max-width:480px), only screen and (max-device-width:480px)' href='index_style_small.css' >
</head>
<body>
	<h1>Fictional Pilgrimages</h1>
	<div id='path'>
		Ti trovi in: Home
		<form method='get' action='registrazione.php'>
    	<button type='submit'>Connettiti</button>
		</form>
	</div>
	<div id='sidenav'>
		<img id='logo' src='./img/logo.png' alt='Logo del sito' />
		<a href='index.php'><img id='home' src='./img/home.png' alt='' />Home</a>
		<a href='ricerca_per_localita.php'><img id='world' src='./img/world.png' alt='' />Ricerca per luogo</a>
		<a href='ricerca_per_titolo.php'><img id='titolo' src='./img/titolo.png' alt='' />Ricerca per titolo</a>
		<a href='#'><img id='utente' src='./img/utente.png' alt='' />Pannello utente</a>
	</div>
	<div id='corpo'>
		<form name='form_csricamento' method='post' action='caricamento.php'>

		<label for='Titolo'>Titolo: </label>
		<input type='text' id='titolo' name='titolo_opera' placeholder='Inserisci il titolo dell&#8217 opera'>

		<label for='Descrizione'>Descrizione: </label>
		<input type='text' id='descrizione' name='descrizione' placeholder='Inserisci una breve descrizione dell&#8217 opera (facoltativo)'>

		<label for='Stato'>Stato: </label>
		<input type='text' id='stato' name='stato' placeholder='Inserisci lo Stato in cui è stata scattata la foto'>

		<label for='Indirizzo'>Indirizzo: </label>
		<input type='text' id='Indirizzo' name='indirizzo' placeholder='Inserisci l&#8217 indirizzo in cui è stata scattata la foto'>

		<label for='località'>Località: </label>
		<input type='text' id='località' name='localita' placeholder='Inserisci la località in cui è stata scattata la foto'>

		<label for='Latitudine'>Latitudine: </label>
		<input type='text' id='latitudine' name='latitudine' placeholder='Inserisci latitudine'>

		<label for='Longitudine'>Longitudine: </label>
		<input type='text' id='longitudine' name='longitudine' placeholder='Inserisci longitudine'>

		<label for='immagine_film'>Immagine tratta dal film: </label>
		<input type='file' id='immagine_film' name='immagine_film' placeholder='Carica l&#8217 immagine del film'>

		<label for='immagine_reale'>Foto: </label>
		<input type='file' id='immagine_reale' name='immagine_reale' placeholder='Carica la foto'>

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