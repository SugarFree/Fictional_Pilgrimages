<?php
	$titolo="Inserisci post - Fictional Pilgrimages";
	$path="Inserisci <span lang='en'>post</span>";
	$current_menu_item=3;
	include "top.php";

	if(isset($_SESSION["username"]))
		include "view/upload.php";
	else
		header("Location: connettiti.php?destination=" . basename(__FILE__));

	include "bottom.php";
?>