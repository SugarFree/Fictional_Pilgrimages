
		<dl>
			<dt>Fotografia:</dt>
			<dd><a target='_blank' href='./uploads/<?php echo $risultato_post->id; ?>.jpg'><img src='./uploads/<?php echo $risultato_post->id; ?>.jpg' /></a></dd>
<?php
	if(file_exists("./uploads/" . $risultato_post->id . "A.jpg"))
		echo "\t\t\t<dt>Corrispettivo <span lang='en'>screencap</span>:</dt>\n" .
			"\t\t\t<dd><a target='_blank' href='./uploads/" . $risultato_post->id . "A.jpg'><img src='./uploads/" . $risultato_post->id . "A.jpg' /></a></dd>\n";
?>
			<dt>Autore:</dt>
			<dd><?php echo $risultato_post->username; ?></dd>
			<dt>Opera:</dt>
			<dd><?php echo "<a href='opera.php?titolo=" . $risultato_post->titolo_opera . "'>" . $risultato_post->titolo_opera . "</a>"; ?></dd>
			<dt>Stato:</dt>
			<dd><?php echo $risultato_post->stato; ?></dd>
			<dt>Localit&agrave;:</dt>
			<dd><?php echo "<a href='localita.php?nome=". $risultato_post->localita . "'>" . $risultato_post->localita . "<a>"; ?></dd>
<?php
	if($risultato_post->indirizzo !== '')
		echo "\t\t\t<dt>Indirizzo:</dt>\n" .
			"\t\t\t<dd>" . $risultato_post->indirizzo . "</dd>\n";

	if(!is_null($risultato_post->latitudine))
		echo "\t\t\t<dt>Latitudine:</dt>\n" .
			"\t\t\t<dd>" . $risultato_post->latitudine . "</dd>\n";

	if(!is_null($risultato_post->longitudine))
		echo "\t\t\t<dt>Longitudine:</dt>\n" .
			"\t\t\t<dd>" . $risultato_post->longitudine . "</dd>\n";

	if($risultato_post->descrizione !== '')
		echo "\t\t\t<dt>Descrizione:</dt>\n" .
			"\t\t\t<dd>" . $risultato_post->descrizione . "</dd>\n";
?>
		</dl>