<?php
	try {
		$query= mysqli_query($conn, "SELECT email FROM utente WHERE username='".$_SESSION['username']."'");
		if(mysqli_error($conn)!="")
			throw new Exception("Errore del database:".mysqli_error($conn));
		$arr = mysqli_fetch_array($query);
		$result= mysqli_query($conn, "SELECT privilegi FROM utente WHERE username='".$_SESSION['username']."'");
		if(mysqli_error($conn)!="")
			throw new Exception("Errore del database:".mysqli_error($conn));
		$arr2 = mysqli_fetch_array($result); }
	catch (Exception $e) {
		echo $e->getMessage(); }
?>

		<h2>Pannello di controllo</h2>
		<dl>
			<dt lang='en'>Username:</dt>
			<dd><?php echo($_SESSION["username"]) ?></dd>
			<dt lang='en'>Email:</dt>
			<dd><?php echo $arr["email"]; ?></dd>
			<dt>Rango:</dt>
			<dd><?php
					if($arr2["privilegi"] == "user")
						echo "Utente";
					else if($arr2["privilegi"] == "admin")
						echo "Amministratore"; ?></dd>
		</dl>
		<div id='cambio'>
			<h2>Cambio <span lang='en'>password</span></h2>
			<form method='post' action='./cambio_password_script.php'>
				<fieldset>
					<label for='vecchia_password'>Immetti la <span lang='en'>password</span> attuale:</label>
					<input type='password' id='vecchia_password' name='password_vecchia' />
					<label for='password'>Immetti la <span lang='en'>password</span> desiderata:</label>
					<input type='password' id='password' name='password' />
					<label for='conferma_password'>Conferma la nuova <span lang='en'>password</span>:</label>
					<input type='password' id='conferma_password' name='conferma_password' />
					<input type='submit' value='Cambia password' />
				</fieldset>
			</form>
		</div>