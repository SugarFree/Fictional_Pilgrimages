<?php
	include "dettaglioOpera_script.php";

	$titolo="ERRORE - Fictional Pilgrimages";
	if(isset($opera) && $opera !== false) {
		$titolo="$opera->titolo - Fictional Pilgrimages";
		$path="<a href='./cerca_opere.php'>Cerca opere</a> > $opera->titolo"; }
	$current_menu_item=-1;
	include "top.php";

	if(isset($opera) && $opera !== false)
		include "view/opera.php";
	else {
		header("Refresh: 3; index.php");
		echo "Sei giunto qui da un link non corretto, verrai reindirizzato alla <span lang='en'>homepage</span> in 3 secondi."; }

	include "bottom.php";
?>