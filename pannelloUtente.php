<?php
	$titolo="Pannello utente - Fictional Pilgrimages";
	$path="Pannello utente";
	$current_menu_item=4;
	include "top.php";

	require_once 'connessione.php';
	if(isset($_SESSION["username"]))
		include "view/pannelloUtente.php";
	else
		header("Location: connettiti.php?destination=" . basename(__FILE__));

	include "bottom.php";
?>
