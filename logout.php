<?php
    /*Questa pagina in sè non riceve parametri, dato che li prende da $_SESSION[]*/

    $errore=""; //Contiene l'eventuale messaggio d'errore
    session_start();

    if(!isset($_SESSION['username']))//Se l'utente non è già loggato
    {
        $errore="Non sei loggato: non puoi fare il logout!";
        die($errore);
    }
    else
    {
        $logoutok=session_destroy();//Altrimenti fa il logout
        if($logoutok==FALSE)//Nella pratica non dovrebbe succedere mai che il logout fallisca
        {
            $errore="Logout Fallito!";
            die($errore);
        }
    }
    echo("Logout effettuato con successo");//Se arriva alla fine significa che ha fatto il logout
?>