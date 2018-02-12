		<h2><?php echo $_GET["nome"]; ?></h2>
<?php

	// Preparo array ordinato per opera
	$post = array();
	foreach($risultato as $val)
		$post[$val->titolo_opera][] = (array)$val;

	// Lo scorro e per ciascuna località mostro la lista dei post
	echo "\t\t<ul class='elenco_riga'>\n";
	foreach($post as $val) {
		echo "\t\t\t<li>\n";
		echo "\t\t\t\t<h3><a href='./opera.php?nome=" . $val[0]["titolo_opera"] . "'>" . $val[0]["titolo_opera"] . "</a></h3>\n";
		echo "\t\t\t\t<ul>\n";
		for($i=0; $i<count($val); $i++)
			echo "\t\t\t\t\t<li  class='elenco_colonna'><a href='./post.php?id=" . $val[$i]["id"] . "'><img src='./uploads/" . $val[$i]["id"] . ".jpg' alt='" . $val[$i]["descrizione"] ."' /></a></li>\n";
		echo "\t\t\t\t</ul>\n";
		echo "\t\t\t</li>\n"; }
	echo "\t\t</ul>";
?>