<?php
	$titolo="ERRORE - Fictional Pilgrimages";
	$ok=isset($_GET["nome"]) && !empty($_GET["nome"]);

	if($ok) {
		$titolo=$_GET["nome"] . " - Fictional Pilgrimages";
		$path="<a href='./cerca_localita.php'>Cerca localit&agrave;</a> &gt; " . $_GET["nome"]; }
	$current_menu_item=-1;
	include "top.php";

	if($ok)
		include "view/localita.php";
	else {
		header("Refresh: 3; cerca_opere.php");
		echo "Sei giunto qui da un link non corretto, verrai reindirizzato alla ricerca opere in 3 secondi."; }

	include "bottom.php";
?>