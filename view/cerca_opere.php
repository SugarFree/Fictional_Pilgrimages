		<h2>Lista opere:</h2>
		<ul><?php
				include __DIR__ . "../../listaTitoli.php";
				for($i=0; $i<count($risultato); $i++) {
					echo "\t\t\t<li><a href='#'>" . $risultato[$i] . "</a></li>\n"; }
			?>
		</ul>