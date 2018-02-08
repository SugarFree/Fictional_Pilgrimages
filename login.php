<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
try {
	if (isset($_SESSION['username'])) { //Se l'utente risulta già loggato, mostra un messaggio adeguato
		header("refresh:3; index.php");
		Throw new Exception("Utente già loggato, esegui il logout prima. Tra 3 secondi sarai reindirizzato alla homepage dove potrai effettuare il logout."); }
	else { //Altrimenti va col login
		require_once 'connessione.php';
		$username = $_POST["username"];
		$password = $_POST["password"];

		//Se l'username o la password inseriti sono vuoti, avvisa l'utente
		if (empty($username)) {
			header("refresh:3; registrazione.php");
			throw new Exception("Inserisci un username. Tra 3 secondi sarai reindirizzato alla pagina di login."); }
		if (empty($password)) {
			header("refresh:3; registrazione.php");
			throw new Exception("Inserisci una password. Tra 3 secondi sarai reindirizzato alla pagina di login."); }

		//Verifica se la combinazione di username e password inserita è corretta
		$verifica_login = $conn->prepare("SELECT username, password FROM utente WHERE username=? AND password=?");
		$verifica_login->bind_param("ss", $username, sha1($password));
		$verifica_login->execute();

		//Se la query per qualche motivo fallisce, mostra un messaggio di errore ed esce
		if ($verifica_login->error != "") {
			header("refresh:3; registrazione.php");
			throw new Exception("Errore del database:" .$verifica_login->error. ". Tra 3 secondi sarai reindirizzato alla pagina di login."); }

		$risultato_login = $verifica_login->get_result();
		if ($risultato_login->num_rows == 1) { //Se corrisponde ai dati presenti nel db si logga come quello specifico utente
			$_SESSION["username"] = $username;

			if(isset($_POST['destination'])) {
				header("Location: " . $_POST['destination']); }
			else {
				header("refresh:3; index.php");
				echo("Ti sei loggato come " .$_SESSION['username']. ". Tra 3 secondi sarai reindirizzato alla homepage."); }

			$verifica_login->close();
			$conn->close(); }
		else { //Altrimenti mostra messaggio di errore ed esce
			header("refresh:3; registrazione.php");
			throw new Exception("Combinazione di nome utente e password errata. Tra 3 secondi sarai reindirizzato alla pagina di login."); }}}

catch (Exception $e) {
	echo "ERRORE: ".  $e->getMessage(); }
?>