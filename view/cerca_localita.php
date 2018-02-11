
		<h2>Lista localit&agrave;:</h2>
		<ul>
<?php
	include __DIR__ . "../../listaLocalita_script.php";
	//var_dump($risultato);
	foreach($risultato as $stato => $localita) {
		echo "\t\t\t<li>\n" .
			"\t\t\t\t<h3>$stato</h3>\n" .
			"\t\t\t\t<ul>\n";
		for($i=0; $i<count($localita); $i++)
			echo "\t\t\t\t\t<li><a href='./localita.php?nome=$localita[$i]'>$localita[$i]</a></li>\n";
		echo "\t\t\t\t</ul>\n" .
			"\t\t\t</li>\n"; }
?>
		</ul>