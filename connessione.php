<?php
	// Costanti per il login al db
	define("DB_SERVER","localhost");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","");
	define("DB_NAME","my_fictionalpilgrimages");

	// Connessione
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	//Controllo errori
	if($conn === false)
		die("ERRORE: Impossibile stabilire una connessione con il database MySQL. " . mysqli_connect_error());
	mysqli_query($conn,"SET NAMES UTF8");
?>