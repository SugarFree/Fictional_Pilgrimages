
		<h2>Lista opere:</h2>
		<ul><?php
				include __DIR__ . "../../listaTitoli_script.php";
				for($i=0; $i<count($risultato); $i++) {
					echo "\t\t\t<li><a href='./opera.php?nome=$risultato[$i]'>" . $risultato[$i] . "</a></li>\n"; }
			?>
		</ul>