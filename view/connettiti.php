
		<div id='registrazione'>
			<h2>Registrati</h2>
			<form method='post' action='registrazione.php'>
				<fieldset>
					<label for='mail'>Inserisci la tua <span lang='en'>email</span>:</label>
					<input type='text' id='mail' name='email' />
					<label for='uname_reg'>Inserisci l'<span lang='en'>username</span> che desideri:</label>
					<input type='text' id='uname_reg' name='username' />
					<label for='pw_reg'>Inserisci una <span lang='en'>password</span>:</label>
					<input type='password' id='pw_reg' name='password' />
					<label for='conferma_pw'>Inseriscila di nuovo per conferma:</label>
					<input type='password' id='conferma_pw' name='conferma_password' />
<?php
	if(isset($_GET['destination']))
		echo "\t\t\t\t\t<input type='hidden' name='destination' value='" . htmlspecialchars($_GET['destination'], ENT_QUOTES) . "' />\n";
?>
					<input type='submit' value='Registrati' />
				</fieldset>
			</form>
		</div>
		<div id='login'>
			<h2>Accedi</h2>
			<form method='post' action='login.php'>
				<fieldset>
					<label for='uname_log'>Inserisci il tuo <span lang='en'>username</span>:</label>
					<input type='text' id='uname_log' name='username' />
					<label for='pw_log'>Inserisci la tua <span lang='en'>password</span>:</label>
					<input type='password' id='pw_log' name='password' />
<?php
	if(isset($_GET['destination']))
		echo "\t\t\t\t\t<input type='hidden' name='destination' value='" . htmlspecialchars($_GET['destination'], ENT_QUOTES) . "' />\n";
?>
					<input type='submit' value='Accedi' />
				</fieldset>
			</form>
		</div>