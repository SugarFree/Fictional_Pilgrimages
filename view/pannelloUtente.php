<h2>Pannello di controllo</h2>
<?php 
	require_once 'connessione.php';
	$query= mysqli_query($conn, "SELECT email FROM utente WHERE username='".$_SESSION['username']."'");
	$arr = mysqli_fetch_array($query);
	$result= mysqli_query($conn, "SELECT privilegi FROM utente WHERE username='".$_SESSION['username']."'");
	$arr2 = mysqli_fetch_array($result);
?>
<ul>
	<li>Username: <?php echo($_SESSION['username']) ?></li>
	<li>Email: <?php echo $arr['email']; ?></li>
	<li>Tipo di utente: <?php echo $arr2['privilegi']; ?></li>
</ul>
<div id='cambio'>
	<h3>Cambio password</h3>
	<form name='cambio_password' method='post' action='./cambio_password_script.php'>
		<label for='password_vecchia'>Vecchia password: </label> 
		<input type='password' id='vecchia_password' name='password_vecchia' placeholder='La tua vecchia password'>

		<label for='password'>Nuova password: </label> 
		<input type='password' id='password' name='password' placeholder='La tua nuova password'>

		<label for='conferma_password'>Conferma nuova password: </label> 
		<input type='password' id='conferma_password' name='conferma_password' placeholder='Riscrivi la tua nuova password'>

		<input type='submit' value='Cambia password'>
	</form>
</div>