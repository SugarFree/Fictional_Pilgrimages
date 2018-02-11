<?php
	$titolo="Inserisci post - Fictional Pilgrimages";
	$path="Inserisci post";
	$current_menu_item=3;
	include "top.php";

	require_once 'connessione.php';
	if(isset($_SESSION["username"]))
		include "view/upload.php";
	else
		header("Location: connettiti.php?destination=" . basename(__FILE__));

	include "bottom.php";
?>