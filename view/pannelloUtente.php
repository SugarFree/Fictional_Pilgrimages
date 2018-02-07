<h2>Pannello di controllo</h2>
<?php 
	require_once 'connessione.php';
	$query= mysqli_query($conn, "SELECT email FROM utente WHERE username='".$_SESSION['username']."'");
	$arr = mysqli_fetch_array($query);
?>
<span>E-mail:</span> <?php echo $arr['email']; ?>