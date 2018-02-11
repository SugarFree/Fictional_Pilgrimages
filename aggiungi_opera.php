<?php
	$titolo="Aggiungi opera - Fictional Pilgrimages";
	$path="Aggiungi opera";
	$current_menu_item=-1;
	include "top.php";

	if(isset($_SESSION["username"]))
		include "view/aggiungi_opera.php";
	else
		header("Location: connettiti.php?destination=" . basename(__FILE__));

	include "bottom.php";
?>