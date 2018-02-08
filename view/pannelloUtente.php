<h2>Pannello di controllo</h2>
<?php 
	require_once '../connessione.php';
	session_start();
	try
    {
        if(!isset($_SESSION['username']))
        {
            throw new Exception("Devi fare il login per visualizzare i dati richiesti");
        }
        $query = mysqli_query($conn, "SELECT email FROM utente WHERE username='" . $_SESSION['username'] . "'");
        if(mysqli_error($conn)!="")
        {
            throw new Exception("Errore del database:".mysqli_error($conn));
        }
        $arr = mysqli_fetch_array($query);
        $result = mysqli_query($conn, "SELECT privilegi FROM utente WHERE username='" . $_SESSION['username'] . "'");
        if(mysqli_error($conn)!="")
        {
            throw new Exception("Errore del database:".mysqli_error($conn));
        }
        $arr2 = mysqli_fetch_array($result);

        //QUI VA L'ECHO DELLA FORM
    }
    catch (Exception $e)
    {
        echo $e->getMessage();

    }

?>
<dl>
	<dt class='grassetto' > Username: </dt><dd><?php echo($_SESSION['username']) ?></dd>
	</br>
	<dt>Email: </dt><dd><?php echo $arr['email']; ?></dd>
	</br>
	<dt>Tipo di utente: </dt><dd><?php echo $arr2['privilegi']; ?></dd>
	</br>
</dl>
<div id='cambio'>
	<h2>Cambio password</h2>
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