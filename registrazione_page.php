<?php
session_start();
include("connessione.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="it" xml:lang="it">

<head>
	<title>Connettiti</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="registrazione_page_style.css">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text:600" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" media="handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" href="registrazione_page_style_small.css" >
</head>

<body>
	<?php
	if(!isset($_SESSION['username'])){
	echo ("
	
	<a href='index.html'><img id='logo' src='./img/logo.png' alt='Logo del sito' /></a>

	<h1>Fictional Pilgrimages</h1>

	<div id='registrazione'>
		<h2>Registrazione</h2>
		<form name='form_registration' method='post' action='registrazione.php'>

		<label for='Uname'>Username: </label>
		<input type='text' id='Uname' name='username' placeholder='Il tuo username'>
		
		<label for='pw'>Password: </label> 
		<input type='password' id='pw' name='password' placeholder='La tua password'>
		
		<label for='mail'>Email: </label> 
		<input type='text' id='mail' name='email' placeholder='La tua mail'>

		<label for='conferma_pw'>Password: </label> 
		<input type='password' id='conferma_pw' name='conferma_password' placeholder='Riscrivi la tua password'>
		
		<input type='submit' value='Registrati'>
		</form>
	</div>
	
	<div id='login'>
		<h2>Login</h2>
		<form name='form_registration' method='post' action='login.php'>

		<label for='Uname'>Username: </label>
		<input type='text' id='Uname' name='username' placeholder='Il tuo username'>

		<label for='pw'>Password: </label> 
		<input type='password' id='pw' name='password' placeholder='La tua password'>
		
		<input type='submit' value='Login'>
		</form>
	</div>
	
	<p><a href='index.html'>Ritorna alla home</a></p>
	");

	}
	else
	echo "Effettuare logout";
	?>
</body>	
	<div id="footer">
		Copyright &copy; 2017 Fictional Pilgrimages | v0.032
	</div>
</body>
</html>
