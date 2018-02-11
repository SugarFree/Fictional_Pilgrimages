
		<form method='post' enctype='multipart/form-data' action='inserimento_post_script.php '>
			<fieldset>
				<label for='titolo_opera'>Inserisci il titolo dell'opera:</label>
				<input type='text' id='titolo_opera' name='titolo_opera' />
				<label for='stato'>Inserisci lo Stato in cui &egrave; stata scattata la foto:</label>
				<input type='text' id='stato' name='stato' />
				<label for='descrizione'>Inserisci una breve descrizione del post:</label>
				<input type='text' id='descrizione' name='descrizione' />
				<label for='indirizzo'>Inserisci l&apos;indirizzo in cui &egrave; stata scattata la foto</label>
				<input type='text' id='indirizzo' name='indirizzo' />
				<label for='localita'>Inserisci la localit&agrave; in cui &egrave; stata scattata la foto:</label>
				<input type='text' id='localita' name='localita' />
				<label for='latitudine'>Inserisci la latitudine:</label>
				<input type='text' id='latitudine' name='latitudine' />
				<label for='longitudine'>Inserisci longitudine:</label>
				<input type='text' id='longitudine' name='longitudine' />
				<label for='immagine_reale'>Seleziona la foto che desideri caricare:</label>
				<input type='file' id='immagine_reale' name='immagine_reale' />
				<label for='immagine_opera'>Carica il corrispondente <span lang='en'>screencap</span> tratto dall'opera:</label>
				<input type='file' id='immagine_opera' name='immagine_film' />
				<input type="submit" value="Inserisci il nuovo post" />
			</fieldset>
		</form>