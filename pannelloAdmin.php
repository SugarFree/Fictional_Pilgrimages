<?php
	$titolo="Pannello amministratore - Fictional Pilgrimages";
	$path="Pannello amministratore";
	$current_menu_item=5;
	include "top.php";

	if(isset($_SESSION["username"]) && $_SESSION["rango"] == "admin")
		include "view/pannelloAdmin.php";
	else
		header("Location: index.php");

	include "bottom.php";
?>
