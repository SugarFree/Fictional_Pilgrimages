		<div id='registrazione'>
			<h2>Registrazione</h2>
			<form name='form_registration' method='post' action='registrazione.php'>
			<label for='mail'>Email:</label>
			<input type='text' id='mail' name='email' placeholder='La tua mail'>
			<label for='Uname'>Username:</label>
			<input type='text' id='Uname' name='username' placeholder='Il tuo username'>
			<label for='pw'>Password:</label>
			<input type='password' id='pw' name='password' placeholder='La tua password'>
			<label for='conferma_pw'>Conferma password:</label>
			<input type='password' id='conferma_pw' name='conferma_password' placeholder='Riscrivi la tua password'>
<?php
	if(isset($_GET['destination']))
		echo "\t\t\t<input type='hidden' name='destination' value='" . htmlspecialchars($_GET['destination'], ENT_QUOTES) . "' />\n";
?>
			<input type='submit' value='Registrati'>
			</form>
		</div>
		<div id='login'>
			<h2>Login</h2>
			<form name='form_registration' method='post' action='login.php'>
			<label for='Uname'>Username:</label>
			<input type='text' id='Uname' name='username' placeholder='Il tuo username'>
			<label for='pw'>Password:</label>
			<input type='password' id='pw' name='password' placeholder='La tua password'>
<?php
	if(isset($_GET['destination']))
		echo "\t\t\t<input type='hidden' name='destination' value='" . htmlspecialchars($_GET['destination'], ENT_QUOTES) . "' />\n";
?>
			<input type='submit' value='Login'>
			</form>
		</div>