<?php
	include "dettaglioPost_script.php";

	$titolo="ERRORE - Fictional Pilgrimages";
	if(isset($risultato_post) && !is_null($risultato_post))
		$titolo="Post " . $risultato_post->titolo_opera . " - Fictional Pilgrimages";
		$path="<a href='opera.php?nome=" . $risultato_post->titolo_opera . "'>" . $risultato_post->titolo_opera . "</a> &gt; " .
			"<a href='localita.php?nome=". $risultato_post->localita . "'>" . $risultato_post->localita . "</a>";
	$current_menu_item=-1;
	include "top.php";

	if(isset($risultato_post) && $risultato_post !== false)
		include "view/post.php";
	else {
		header("Refresh: 3; URL=index.php");
		echo "Sei giunto qui da un <span lang='en'>link</span> non corretto, verrai reindirizzato alla <span lang='en'>homepage</span> in 3 secondi."; }

	include "bottom.php";
?>
