<?php
	include "dettaglioOpera_script.php";

	$titolo="ERRORE - Fictional Pilgrimages";
	if(isset($opera) && $opera !== false) {
		$titolo="$opera->titolo - Fictional Pilgrimages";
		$path="<a href='./cerca_opere.php'>Cerca opere</a> &gt; $opera->titolo"; }
	$current_menu_item=-1;
	include "top.php";

	if(isset($opera) && $opera !== false)
		include "view/opera.php";
	else {
		header("Refresh: 3; URL=cerca_opere.php");
		echo "Sei giunto qui da un <span lang='en'>link</span> non corretto, verrai reindirizzato alla ricerca opere in 3 secondi."; }

	include "bottom.php";
?>