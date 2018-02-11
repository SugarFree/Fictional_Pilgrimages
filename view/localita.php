		<h2><?php echo $_GET["nome"]; ?></h2>
<?php
	include __DIR__ . "../../ricerca_per_localita_script.php";
	echo "\t\t<ul>\n";
	for($i=0; $i<count($risultato); $i++)
		echo "\t\t\t<li><a href='./post.php?id=" . $risultato[$i]->id . "'><img src='./uploads/" . $risultato[$i]->id . ".jpg' alt='" . $risultato[$i]->descrizione ."' /></a></li>\n";
	echo "\t\t</ul>";
?>