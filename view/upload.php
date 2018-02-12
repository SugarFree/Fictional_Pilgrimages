
		<h2>Inserimento <span lang='en'>post</span></h2>
		<form method='post' enctype='multipart/form-data' action='inserimento_post_script.php '>
			<fieldset>
				<label for='titolo_opera'>Seleziona l'opera raffigurata dalla tua fotografia tra quelle nella tendina:</label>
				<select id='titolo_opera' name='titolo_opera'>
<?php
	include __DIR__ . "../../listaTuttiTitoli_script.php";
	for($i=0; $i<count($titoli); $i++)
		echo "\t\t\t\t\t<option value='" . $titoli[$i] . "'>" . $titoli[$i] . "</option>\n";
?>
				</select>
				<p>L'opera che desideri non &egrave; presente? Puoi <a href='./aggiungi_opera.php'>aggiungerla</a>!</p>
				<label for='descrizione-post'>Inserisci una breve descrizione:</label>
				<input type='text' id='descrizione-post' name='descrizione' />
				<label for='stato'>Inserisci la nazione in cui ti trovavi:</label>
				<input type='text' id='stato' name='stato' />
				<label for='localita'>Inserisci la localit&agrave; in cui ti trovavi:</label>
				<input type='text' id='localita' name='localita' />
				<label for='indirizzo'>Inserisci un eventuale indirizzo del posto raffigurato:</label>
				<input type='text' id='indirizzo' name='indirizzo' />
				<label for='latitudine'>Inserisci la latitudine del luogo dello scatto, se la conosci:</label>
				<input type='text' id='latitudine' name='latitudine' />
				<label for='longitudine'>Inserisci la longitudine del luogo dello scatto, se la conosci:</label>
				<input type='text' id='longitudine' name='longitudine' />
				<label for='immagine_reale'>Seleziona la foto che desideri caricare:</label>
				<input type='file' id='immagine_reale' name='immagine_film' />
				<label for='immagine_opera'>Seleziona un eventuale <span lang='en'>screencap</span> tratto dall'opera corrispondente alla foto:</label>
				<input type='file' id='immagine_opera' name='immagine_reale' />
				<input class='inserimento' type="submit" value="Procedi con l'inserimento" />
			</fieldset>
		</form>
