<?php
    /*Questa pagina in sè non riceve parametri, dato che li prende da $_SESSION[]*/

    $errore=""; //Contiene l'eventuale messaggio d'errore
    session_start();
try {
    if (!isset($_SESSION['username']))//Se l'utente non è già loggato
    {
        throw new Exception("Non sei loggato: non puoi fare il logout!");
    } else {
        $logoutok = session_destroy();//Altrimenti fa il logout
        if ($logoutok == FALSE)//Nella pratica non dovrebbe succedere mai che il logout fallisca
        {
            throw new Exception("Logout Fallito!");
        }
    }
    //echo("Logout effettuato con successo");//Se arriva alla fine significa che ha fatto il logout
    header("Location: index.php");
}
catch (Exception $e)
{
    echo "ERRORE: ".  $e->getMessage();
}
?>