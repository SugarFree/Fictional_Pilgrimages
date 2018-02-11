
		<h2><?php echo $opera->titolo; ?></h2>
		<dl>
			<dt>Tipo:</dt>
			<dd><?php if($opera->tipo == "serietv")
							echo "Serie TV";
						else if($opera->tipo == "film")
							echo "Film"; ?></dd>
			<dt>Sinossi:</dt>
			<dd><?php echo $opera->descrizione; ?></dd>
		</dl>
<?php
	include __DIR__ . "../../ricerca_per_titolo_script.php";

	// Preparo array ordinato per località
	$post = array();
	foreach($risultato as $val)
		$post[$val->localita][] = (array)$val;

	// Lo scorro e per ciascuna località mostro la lista dei post
	echo "\t\t<ul>\n";
	foreach($post as $val) {
		echo "\t\t\t<li>\n";
		echo "\t\t\t\t<h3><a href='./localita?nome=" . $val[0]["localita"] . "'>" . $val[0]["localita"] . "</a></h3>\n";
		echo "\t\t\t\t<ul>\n";
		for($i=0; $i<count($val); $i++)
			echo "\t\t\t\t\t<li><a href='./post.php?id=" . $val[$i]["id"] . "'><img src='./uploads/" . $val[$i]["id"] . ".jpg' alt='" . $val[$i]["descrizione"] ."' /></a></li>\n";
		echo "\t\t\t\t</ul>\n";
		echo "\t\t\t</li>\n"; }
	echo "\t\t</ul>\n";
?>