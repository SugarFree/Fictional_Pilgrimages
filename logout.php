<?php
$errore = ""; // Conterrà l'eventuale messaggio di errore
$redirect_location = "index.php";
session_start();
try
{
    if (!isset($_SESSION['username'])) // Se l'utente non è già loggato
        throw new Exception("Non sei connesso: non puoi sconnetterti!");
    else
    {
        $logoutok = session_destroy(); // Altrimenti fa il logout
        if ($logoutok == FALSE) // Nella pratica non dovrebbe succedere mai che il logout fallisca
            throw new Exception("Disconnessione fallita!");
    }
    echo("Disconnessione effettuata con successo.");
    header("Location: $redirect_location");
} // Se arriva alla fine significa che ha fatto il logout
catch (Exception $e)
{
    echo "ERRORE: " . $e->getMessage() . "Tra 3 secondi verrai reindirizzato.";
    header("Refresh: 3; URL=$redirect_location");
}
?>