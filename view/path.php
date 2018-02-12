	<div id='path'>
		<span id='sentiero'>Ti trovi in: <?php echo $path . "\n";?></span>
<?php
	session_start();
	if(!isset($_SESSION["username"])) {
		echo ("\t\t<div id='saluto'>\n" .
			"\t\t\t<form method='get' action='connettiti.php'>\n" .
			"\t\t\t\t<fieldset>\n" .
			"\t\t\t\t\t<input type='hidden' name='destination' value='" . $_SERVER["REQUEST_URI"] . "' />\n" .
			"\t\t\t\t\t<button type='submit'>Connettiti</button>\n" .
			"\t\t\t\t</fieldset>\n" .
			"\t\t\t</form>\n" .
			"\t\t</div>"); }
	else {
		echo ("\t\t<div id='saluto'>Ciao " . $_SESSION['username'] . "!\n" .
			"\t\t\t<form method='post' action='logout.php'>\n" .
			"\t\t\t\t<fieldset>\n" .
			"\t\t\t\t\t<input type='hidden' name='destination' value='" . $_SERVER["REQUEST_URI"] . "' />\n" .
			"\t\t\t\t\t<button type='submit'>Sconnettiti</button>\n" .
			"\t\t\t\t</fieldset>\n" .
			"\t\t\t</form>\n" .
			"\t\t</div>\n");	}
?>
	</div>
