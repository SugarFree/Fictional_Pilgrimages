<?php
session_start();
include("connessione.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="it" xml:lang="it">

<head>
	<title>Fictional Pilgrimages - Registrazione</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<h1>Registrazione</h1>   
	<form name="form_registration" method="post" action="registrazione.php">
	<br/>
	<p>Username: <input type="text" name="username"></p>
	<br/>
	<p>Password: <input type="password" name="password"></p>
	<br/>
	<p>Email: <input type="text" name="email" ></p>
	<br/>
	<p>Conferma password: <input type="password" name="conferma_password"></p>
	<br/>
	<button>Registrati</button>
	</form>
</body>
</html>