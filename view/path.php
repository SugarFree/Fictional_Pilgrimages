	<div id='path'>
		Ti trovi in: <?php echo $path . "\n";?>
		<?php
			session_start();
			if(!isset($_SESSION["username"])) {
				echo ("<form method='get' action='registrazione.php'>\n" .
					"\t\t\t<div>\n" .
					"\t\t\t\t<button type='submit'>Collegati</button>\n" .
					"\t\t\t</div>\n" .
					"\t\t</form>\n"); }
			else {
				echo ("<form method='get' action='logout.php'>\n" .
					"\t\t\t<div>\n" .
					"\t\t\t\t<button type='submit'>Scollegati</button>\n" .
					"\t\t\t</div>\n" .
					"\t\t</form>\n" .
					"\t\t<span id='prova'>Ciao " . $_SESSION['username'] . "!</span>\n");	}
		?>
	</div>
