
		<h2><span lang='en'>Post</span> da approvare</h2>
<?php
	include __DIR__ . "../../listaPostdaApprovare_script.php";
	//var_dump($array_post);
	echo "\t\t<ul>\n";
	for($i=0; $i<count($array_post); $i++) {
		echo "\t\t\t<li>\n" .
			"\t\t\t\t<form action='modificaPost_script.php'>\n" .
			"\t\t\t\t\t<fieldset>\n" .
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