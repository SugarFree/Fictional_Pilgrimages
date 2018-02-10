<?php
	$titolo="Connettiti - Fictional pilgrimages";
	$current_menu_item=-1;
	$local_style="registrazione";
	include "top.php";

	//session_start();
	include("connessione.php");
	if(!isset($_SESSION['username']))
		include "view/registrazione.php";
	else
		echo "Effettuare logout";

	include "bottom.php";
?>