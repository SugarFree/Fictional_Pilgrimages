<?php
require_once "connessione.php";
require_once "funzioni.php";

$titolo=$_GET["nome"];
$errore="";
$titolo=trim(strip_tags($titolo));

try {
	if (empty($titolo)) { //Se non è stato specificato un titolo, ritorna tutti i post
		// Non occorre usare un prepared statement perchè non ci sono input di nessun tipo
		$risultato = mysqli_query($conn, "SELECT * FROM post WHERE approvato=TRUE");
		if ($risultato == FALSE) {
			$errore = mysqli_error($conn);
			throw new Exception($errore); }}
	else {
		$risultato = $conn->prepare("SELECT * FROM post WHERE approvato=TRUE AND titolo_opera=?");
		$risultato->bind_param("s", $titolo);
		$risultato->execute();
		if ($risultato->error != "") {
			$errore = mysqli_error($conn);
			throw new Exception($errore); }
		$risultato = $risultato->get_result(); }

	// L'array di oggetti "post" si trova in $risultato. Se non c'è nessun risultato ritorna FALSE.
	$risultato = risultato_array_post($risultato); }
catch (Exception $e) {
	echo "ERRORE: ".  $e->getMessage(); }