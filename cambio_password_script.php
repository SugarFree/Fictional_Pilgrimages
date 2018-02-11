<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once "connessione.php";
$password_vecchia = $_POST["password_vecchia"];
$password = $_POST["password"];
$conferma_password = $_POST["conferma_password"];
$username = $_SESSION["username"];


try
{
    if (empty($_SESSION["username"]))
    {
        throw  new Exception("Devi loggarti per poter effettuare questa azione. Tra 3 secondi sarai reindirizzato alla pagina di login.");
    }

    if ($password != $conferma_password)
    {
        throw new Exception("Le due password non coincidono. Tra 3 secondi sarai reindirizzato al pannello utente.");
    }
    if (empty($password))
    {
        throw new Exception("Non puoi inserire una password vuota. Tra 3 secondi sarai reindirizzato al pannello utente.");
    }

    $password_vecchia=sha1($password_vecchia);
	$password=sha1($password);

    $verifica_login = $conn->prepare("SELECT username, password FROM utente WHERE username=? AND password=?");
    $verifica_login->bind_param("ss", $username, $password_vecchia);
    $verifica_login->execute();

    //Se la query per qualche motivo fallisce, mostra un messaggio di errore ed esce
    if ($verifica_login->error != "")
    {
        throw new Exception("Errore del database:" . $verifica_login->error . ". Tra 3 secondi sarai reindirizzato al pannello utente.");
    }
    $risultato_login = $verifica_login->get_result();

    if ($risultato_login->num_rows != 1)
    {
        throw new Exception("Password vecchia errata. Tra 3 secondi sarai reindirizzato al pannello utente.");
    }

    $queryModifica = $conn->prepare("UPDATE utente SET password=? WHERE username=?");
    $queryModifica->bind_param("ss", $password, $username);
    $queryModifica->execute();
    if ($queryModifica->error != "")
    {
        throw new Exception("Errore ritornato dal database:" . $queryModifica->error . ". Tra 3 secondi sarai reindirizzato al pannello utente.");
    }
    header("Refresh: 3; URL=pannelloUtente.php");
    echo "Password cambiata correttamente. Tra 3 secondi verrai reindirizzato al pannello utente.";
}
catch (Exception $e)
{
	header("Refresh: 3; URL=pannelloUtente.php");
    echo $e->getMessage() . "Tra 3 secondi verrai reindirizzato al pannello utente.";
}