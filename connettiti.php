<?php
	$titolo="Connettiti - Fictional pilgrimages";
	$current_menu_item=-1;
	$local_style="connettiti";
	include "top.php";

	include("connessione.php");
	session_start();
	if(!isset($_SESSION['username']))
		include "view/connettiti.php";
	else {
		header("Refresh: 3; URL=index.php");
		echo "Sei giunto qui da un link non corretto, verrai reindirizzato alla <span lang='en'>homepage</span> in 3 secondi.";	}

	include "bottom.php";
?>