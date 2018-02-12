
		<h2><span lang='en'>Post</span> da approvare</h2>
<?php
	include __DIR__ . "../../listaPostdaApprovare_script.php";
	//var_dump($array_post);
	echo "\t\t<ul>\n";
	for($i=0; $i<count($array_post); $i++) {
		echo "\t\t\t<li>\n" .
			"\t\t\t\t<form action='modificaPost_script.php'>\n" .
			"\t\t\t\t\t<fieldset>\n" .
			"\t\t\t\t\t\t<label for='descrizione-post-" . $array_post[$i]->id . "'>Descrizione <span lang='en'>post</span>:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='descrizione-post-" . $array_post[$i]->id . "' name='descrizione' value='" . $array_post[$i]->descrizione . "' />\n" .
			"\t\t\t\t\t\t<label for='stato-" . $array_post[$i]->id . "'>Stato:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='stato-" . $array_post[$i]->id . "' name='stato' value='" . $array_post[$i]->stato . "' />\n" .
			"\t\t\t\t\t\t<label for='localita-" . $array_post[$i]->id . "'>Localit&agrave;:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='localita-" . $array_post[$i]->id . "' name='localita' value='" . $array_post[$i]->localita . "' />\n" .
			"\t\t\t\t\t\t<label for='indirizzo-" . $array_post[$i]->id . "'>Indirizzo:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='indirizzo-" . $array_post[$i]->id . "' name='indirizzo' value='" . $array_post[$i]->indirizzo . "' />\n" .
			"\t\t\t\t\t\t<label for='latitudine-" . $array_post[$i]->id . "'>Latitudine:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='latitudine-" . $array_post[$i]->id . "' name='latitudine' value='" . $array_post[$i]->latitudine . "' />\n" .
			"\t\t\t\t\t\t<label for='longitudine-" . $array_post[$i]->id . "'>Longitudine:</label>\n" .
			"\t\t\t\t\t\t<input type='text' id='longitudine-" . $array_post[$i]->id . "' name='longitudine' value='" . $array_post[$i]->longitudine . "' />\n" .
			"\t\t\t\t\t\t<input type='hidden' name='id' value='" . $array_post[$i]->id . "' />\n" .
			"\t\t\t\t\t\t<input type='submit' value='Modifica ed approva' />\n" .
			"\t\t\t\t\t</fieldset>\n" .
			"\t\t\t\t</form>\n" .
			"\t\t\t\t<form action='cancellaPost_script.php'>\n" .
			"\t\t\t\t\t<fieldset>\n" .
			"\t\t\t\t\t\t<input type='hidden' name='id' value='" . $array_post[$i]->id . "' />\n" .
			"\t\t\t\t\t\t<input type='submit' value='Cancella' />\n" .
			"\t\t\t\t\t</fieldset>\n" .
			"\t\t\t\t</form>\n" .
			"\t\t\t</li>\n";
	}
	echo "\t\t</ul>";
?>