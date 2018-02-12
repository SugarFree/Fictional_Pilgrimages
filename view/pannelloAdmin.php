
		<h2><span lang='en'>Post</span> da approvare</h2>
<?php
	include __DIR__ . "../../listaPostdaApprovare_script.php";
	echo "\t\t<ul>\n";
	for($k=0; $k<count($array_post); $k++) {
		echo "\t\t\t<li>\n" .
			"\t\t\t\t<h3>Post #" . $array_post[$k]->id . "</h3>\n" .
			"\t\t\t\t<form method='post' enctype='multipart/form-data' action='modificaPost_script.php'>\n" .
			"\t\t\t\t\t<fieldset>\n" .
			"\t\t\t\t\t\t<label for='titolo_opera-" . $array_post[$k]->id . "'>Titolo opera:</label>\n" .
			"\t\t\t\t\t\t<select id='titolo_opera-" . $array_post[$k]->id . "' name='titolo_opera'>\n";
		include __DIR__ . "../../listaTuttiTitoli_script.php";
		for($j=0; $j<count($titoli); $j++) {
			echo "\t\t\t\t\t\t\t<option ";
			if($titoli[$j] == $array_post[$k]->titolo_opera)
				echo "selected='selected' ";
			echo "value='" . $titoli[$j] . "'>" . $titoli[$j] . "</option>\n"; }
		echo "\t\t\t\t\t\t</select>\n" .
			"\t\t\t\t\t\t<label for='descrizione-post-" . $array_post[$k]->id . "'>Descrizione <span lang='en'>post</span>:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='descrizione-post-" . $array_post[$k]->id . "' name='descrizione' value='" . $array_post[$k]->descrizione . "' />\n" .
			"\t\t\t\t\t\t<label for='stato-" . $array_post[$k]->id . "'>Stato:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='stato-" . $array_post[$k]->id . "' name='stato' value='" . $array_post[$k]->stato . "' />\n" .
			"\t\t\t\t\t\t<label for='localita-" . $array_post[$k]->id . "'>Localit&agrave;:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='localita-" . $array_post[$k]->id . "' name='localita' value='" . $array_post[$k]->localita . "' />\n" .
			"\t\t\t\t\t\t<label for='indirizzo-" . $array_post[$k]->id . "'>Indirizzo:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='indirizzo-" . $array_post[$k]->id . "' name='indirizzo' value='" . $array_post[$k]->indirizzo . "' />\n" .
			"\t\t\t\t\t\t<label for='latitudine-" . $array_post[$k]->id . "'>Latitudine:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='latitudine-" . $array_post[$k]->id . "' name='latitudine' value='" . $array_post[$k]->latitudine . "' />\n" .
			"\t\t\t\t\t\t<label for='longitudine-" . $array_post[$k]->id . "'>Longitudine:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='longitudine-" . $array_post[$k]->id . "' name='longitudine' value='" . $array_post[$k]->longitudine . "' />\n" .
			"\t\t\t\t\t\t<input type='hidden' name='id' value='" . $array_post[$k]->id . "' />\n" .
			"\t\t\t\t\t\t<input type='submit' value='Modifica ed approva' />\n" .
			"\t\t\t\t\t</fieldset>\n" .
			"\t\t\t\t</form>\n" .
			"\t\t\t\t<form method='post' enctype='multipart/form-data' action='cancellaPost_script.php'>\n" .
			"\t\t\t\t\t<fieldset>\n" .
			"\t\t\t\t\t\t<input type='hidden' name='id' value='" . $array_post[$k]->id . "' />\n" .
			"\t\t\t\t\t\t<input type='submit' value='Cancella' />\n" .
			"\t\t\t\t\t</fieldset>\n" .
			"\t\t\t\t</form>\n" .
			"\t\t\t</li>\n"; }
	echo "\t\t</ul>";
?>