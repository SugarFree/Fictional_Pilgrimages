
		<h2>Aggiungi opera</h2>
		<form method='post' enctype='multipart/form-data' action='inserimento_opera_script.php '>
			<fieldset>
				<label for='titolo_opera'>Seleziona l'opera raffigurata dalla tua fotografia tra quelle nella tendina:</label>
				<input type='text' id='titolo_opera' name='titolo' />
				<label for='descrizione_opera'>Inserisci una breve descrizione:</label>
				<input type='text' id='descrizione_opera' name='descrizione' />
				<label for='tipo_opera'>Seleziona la tipologia dell'opera:</label>
				<select id='tipo_opera' name='tipo'>
					<option value='serietv'>Serie TV</option>
					<option value='film'>Film</option>
				</select>
				<input type="submit" value="Procedi con l'aggiunta" />
			</fieldset>
		</form>