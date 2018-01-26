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
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text:600" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="registrazione_page_style.css" />
	<link rel="stylesheet" type="text/css" media="handheld, screen and (max-width:480px), only screen and (max-device-width:480px)" href="registrazione_page_style_small.css" >
</head>

<body>
	<?php
	if(!isset($_SESSION['username'])){
	echo ("
	<img id='logo' src='./img/logo.png' alt='Logo del sito' />
	<div id='registrazione'>
		<h1>Registrazione</h1>   
		<form name='form_registration' method='post' action='registrazione.php'>
		<br/>
		<p>Username: <input type='text' name='username'></p>
		<br/>
		<p>Password: <input type='password' name='password'></p>
		<br/>	
		<p>Email: <input type='text' name='email' ></p>
		<br/>
		<p>Conferma password: <input type='password' name='conferma_password'></p>
		<br/>
		<input type='submit' value='Registrati'>
		</form>
	</div>
	
	<div id='login'>
		<h1>Login</h1>   
		<form name='form_registration' method='post' action='login.php'>
		<br/>
		<p>Username: <input type='text' name='username'></p>
		<br/>
		<p>Password: <input type='password' name='password'></p>
		<br/>
		<button>Login</button>
		<br/>
		</form>
		<a href='index.html'>Ritorna alla home</a>
	</div>");

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
