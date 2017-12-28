<?php
session_start();

if(isset($_SESSION['username']))//Se l'utente risulta già loggato, mostra un messaggio adeguato
{

    $errore="Utente già loggato, esegui il logout prima";
    die($errore);
}
else//Altrimenti va col login
{
    require_once 'connessione.php';


    /* Dati di prova: quelli veri li riceve dal form
     * $username="user";
     * $password="prova";
     * $errore = "";
    */

    //Se l'username o la password inseriti sono vuoti, avvisa l'utente
    if (empty($username))
    {
        $errore = "Inserisci un username";
        die($errore);
    }
    if (empty($password))
    {
        $errore = "Inserisci una password";
        die($errore);
    }

    //Verifica se la combinazione di username e password inserita è corretta

    $verifica_login = $conn->prepare("SELECT username, password FROM utente WHERE username=? AND password=?");
    $verifica_login->bind_param("ss", $username, sha1($password));
    $verifica_login->execute();

    //Se la query per qualche motivo fallisce, mostra un messaggio di errore ed esce
    if ($verifica_login->error != "")
    {
        $errore = "Errore del database:" . $verifica_login->error;
        die($errore);
    }

    $risultato_login = $verifica_login->get_result();
    if ($risultato_login->num_rows == 1) //Se corrisponde ai dati presenti nel db si logga come quello specifico utente
    {
        $_SESSION['username'] = $username;
        echo("Ti sei loggato come ". $_SESSION['username']);
        $verifica_login->close();
        $conn->close();
    }
    else//Altrimenti mostra messaggio di errore ed esce
    {
        $errore = "Combinazione di nome utente e password errata";
        die($errore);
    }
}
?>