<?php
	error_reporting(E_ALL & ~E_NOTICE);
	$redirect_location=(isset($_POST["destination"]) ? $_POST["destination"] : "connettiti.php");
	session_start();
	try {
		if (isset($_SESSION['username'])) // Se l'utente risulta già loggato, mostra un messaggio adeguato
			Throw new Exception("Utente già loggato, esegui il logout prima.");
		else { // Altrimenti va col login
			require_once 'connessione.php';
			$username = $_POST["username"];
			$password = $_POST["password"];
			$hashed_psw=sha1($password);

			// Se l'username o la password inseriti sono vuoti, avvisa l'utente
			if (empty($username))
				throw new Exception("Inserisci un username.");
			if (empty($password))
				throw new Exception("Inserisci una password.");

			// Verifica se la combinazione di username e password inserita è corretta
			$verifica_login = $conn->prepare("SELECT username, password FROM utente WHERE username=? AND password=?");
			$verifica_login->bind_param("ss", $username, $hashed_psw);
			$verifica_login->execute();

			// Se la query per qualche motivo fallisce, mostra un messaggio di errore ed esce
			if ($verifica_login->error != "")
				throw new Exception("Errore del database:" . $verifica_login->error);

			$risultato_login = $verifica_login->get_result();
			if ($risultato_login->num_rows == 1) { // Se corrisponde ai dati presenti nel db si logga come quello specifico utente
				$_SESSION["username"] = $username;
				header("refresh:3; $redirect_location");
				echo("Sei acceduto come " . $_SESSION['username'] . ". Tra 3 secondi verrai reindirizzato.");

				$verifica_login->close();
				$conn->close(); }
			else //Altrimenti mostra messaggio di errore ed esce
				throw new Exception("Combinazione di nome utente e password errata."); }}
	catch (Exception $e) {
		echo "ERRORE: " . $e->getMessage() . " Tra 3 secondi verrai reindirizzato.";
		header("refresh:3; $redirect_location"); }
?>