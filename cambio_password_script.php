<?php
session_start();
require_once "connessione.php";
$password_vecchia=$_POST["password_vecchia"];
$password=$_POST["password"];
$conferma_password=$_POST["conferma_password"];
$username=$_POST["username"];


try
{
    if(empty($_SESSION["username"]))
    {
        throw  new Exception("Devi loggarti per poter effettuare questa azione");
    }

    if($password!=$conferma_password)
    {
        throw new Exception("Le due password non coincidono");
    }
    if(empty($password))
    {
        throw new Exception("Non puoi inserire una password vuota");
    }

    $verifica_login = $conn->prepare("SELECT username, password FROM utente WHERE username=? AND password=?");
    $verifica_login->bind_param("ss", $username, sha1($password_vecchia));
    $verifica_login->execute();

    //Se la query per qualche motivo fallisce, mostra un messaggio di errore ed esce
    if ($verifica_login->error != "")
    {
        throw new Exception("Errore del database:" . $verifica_login->error);
    }
    $risultato_login = $verifica_login->get_result();

    if ($risultato_login->num_rows != 1)
    {
        throw new Exception("Password vecchia errata");
    }

    $queryModifica = $conn->prepare("UPDATE utente SET password=? WHERE username=?");
    $queryModifica->bind_param("ss",sha1($password), $username );
    $queryModifica->execute();
    if ($queryModifica->error != "")
    {
        throw new Exception( "Errore ritornato dal database:" . $queryModifica->error);
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}
echo "Password cambiata correttamente";