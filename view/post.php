
		<div id='post'>
			<dl id='immagini'>
				<dt>Fotografia:</dt>
				<dd><a href='./uploads/<?php echo $risultato_post->id; ?>.jpg'><img src='./uploads/<?php echo $risultato_post->id; ?>.jpg' alt='' /></a></dd>
<?php
	if(file_exists("./uploads/" . $risultato_post->id . "A.jpg"))
		echo "\t\t\t\t<dt>Corrispettivo <span lang='en'>screencap</span>:</dt>\n" .
			"\t\t\t\t<dd><a href='./uploads/" . $risultato_post->id . "A.jpg'><img src='./uploads/" . $risultato_post->id . "A.jpg' alt='' /></a></dd>\n";
?>
			</dl>
			<dl id='info'>
				<dt>Autore:</dt>
				<dd><?php echo $risultato_post->username; ?></dd>
				<dt>Opera:</dt>
				<dd><?php echo "<a href='opera.php?nome=" . $risultato_post->titolo_opera . "'>" . $risultato_post->titolo_opera . "</a>"; ?></dd>
				<dt>Stato:</dt>
				<dd><?php echo $risultato_post->stato; ?></dd>
				<dt>Localit&agrave;:</dt>
				<dd><?php echo "<a href='localita.php?nome=". $risultato_post->localita . "'>" . $risultato_post->localita . "</a>"; ?></dd>
<?php
	if($risultato_post->indirizzo !== '')
		echo "\t\t\t\t<dt>Indirizzo:</dt>\n" .
			"\t\t\t\t<dd>" . $risultato_post->indirizzo . "</dd>\n";

	if(!is_null($risultato_post->latitudine))
		echo "\t\t\t\t<dt>Latitudine:</dt>\n" .
			"\t\t\t\t<dd>" . $risultato_post->latitudine . "</dd>\n";

	if(!is_null($risultato_post->longitudine))
		echo "\t\t\t\t<dt>Longitudine:</dt>\n" .
			"\t\t\t\t<dd>" . $risultato_post->longitudine . "</dd>\n";

	if($risultato_post->descrizione !== '')
		echo "\t\t\t\t<dt>Descrizione:</dt>\n" .
			"\t\t\t\t<dd>" . $risultato_post->descrizione . "</dd>\n";
?>
			</dl>
		</div>
<?php
	if(!(is_null($risultato_post->latitudine) || is_null($risultato_post->longitudine)))
		echo "\t\t<div id='mappa'>\n" .
			"\t\t\t<h3 lang='en'>Streetview:</h3>\n" .
			"\t\t\t<object width='500px' height='500px' data='https://www.google.com/maps/embed/v1/streetview?key=AIzaSyBEEJQuz4dw1e0pSdKoaUzOsg0iZsnZgHQ&amp;location=" .
			$risultato_post->latitudine . "," . $risultato_post->longitudine . "'></object>\n" .
			"\t\t</div>\n";

	if($risultato_commenti !== false) {
		echo "\t\t<ul id='commenti'>\n";
		for($i=0; $i<count($risultato_commenti); $i++) {
			echo "\t\t\t<li>\n" .
				"\t\t\t\t<p>" . $risultato_commenti[$i]->testo . "</p>\n" .
				"\t\t\t\t<p class='dati'> Inviato da " . $risultato_commenti[$i]->username . " il " . $risultato_commenti[$i]->timestamp . "</p>\n" .
				"\t\t\t</li>\n"; }
		echo "\t\t</ul>\n"; }

		if(isset($_SESSION['username'])) {
			echo "\t\t<form method='post' action='inserimento_commento_script.php'>\n" .
				"\t\t\t<fieldset>\n" .
				"\t\t\t\t<input type='hidden' name='id_post' value='$risultato_post->id' />\n" .
				"\t\t\t\t<label for='testo_commento'>Scrivi un commento:</label>\n" .
				"\t\t\t\t<textarea name='testo' id='testo_commento' rows='5' cols='25'></textarea>\n" .
				"\t\t\t\t<input type='submit' value='Invia' />\n" .
				"\t\t\t</fieldset>\n" .
				"\t\t</form>"; }
		else
			echo "\t\t<a href='./connettiti.php?destination=post.php?id=" . $risultato_post->id . "'>Collegati</a> per poter inviare commenti.";
?>