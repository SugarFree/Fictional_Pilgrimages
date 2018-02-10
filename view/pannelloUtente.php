<?php
try
{
    $query = mysqli_query($conn, "SELECT email FROM utente WHERE username='" . $_SESSION['username'] . "'");
    if (mysqli_error($conn) != "")
        throw new Exception("Errore del database:" . mysqli_error($conn));
    $arr = mysqli_fetch_array($query);
    $result = mysqli_query($conn, "SELECT privilegi FROM utente WHERE username='" . $_SESSION['username'] . "'");
    if (mysqli_error($conn) != "")
        throw new Exception("Errore del database:" . mysqli_error($conn));
    $arr2 = mysqli_fetch_array($result);
}
catch (Exception $e)
{
    echo $e->getMessage();
}
?>
<h2>Pannello di controllo</h2>
<dl>
    <dt>Username:</dt>
    <dd><?php echo($_SESSION["username"]) ?></dd>
    <dt>Email:</dt>
    <dd><?php echo $arr["email"]; ?></dd>
    <dt>Tipo di utente:</dt>
    <dd><?php echo $arr2["privilegi"]; ?></dd>
</dl>
<div id='cambio'>
    <h2>Cambio password</h2>
    <form method='post' action='./cambio_password_script.php'>
        <fieldset>
            <label for='vecchia_password'>Vecchia password: </label>
            <input type='password' id='vecchia_password' name='password_vecchia'/>
            <label for='password'>Nuova password: </label>
            <input type='password' id='password' name='password'/>
            <label for='conferma_password'>Conferma nuova password: </label>
            <input type='password' id='conferma_password' name='conferma_password'/>
            <input type='submit' value='Cambia password'/>
        </fieldset>
    </form>
</div>