<?php
	include "dettaglioPost_script.php";

	$titolo="Fictional Pilgrimages";
	if(isset($risultato_post) && $risultato_post !== false)
		$path="<a href='opera.php?nome=" . $risultato_post->titolo_opera . "'>" . $risultato_post->titolo_opera . "</a> &gt; " .
			"<a href='localita.php?nome=". $risultato_post->localita . "'>" . $risultato_post->localita . "</a>";
	$current_menu_item=-1;
	include "top.php";

	if(isset($risultato_post) && $risultato_post !== false)
		include "view/post.php";
	else {
		header("Refresh: 3; index.php");
		echo "Sei giunto qui da un link non corretto, verrai reindirizzato alla <span lang='en'>homepage</span> in 3 secondi."; }

	include "bottom.php";
?>