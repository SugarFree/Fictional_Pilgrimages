<?php
require_once "connessione.php";
require_once "commento.php";
require_once "post.php";
require_once "funzioni.php";
/*Questa pagina permette di vedere tutti i post e commenti di un determinato utente
 *il cui username è passato come parametro.
 * I post sono oggetti di tipo "post" contenuti nel vettore $array_post.
 * I commenti sono oggetti di tipo "commento" contenuti nel vettore $array_commenti.
 */
$username = $_POST["username"];
$username=trim(strip_tags($username));
try
{
    $risultato = $conn->prepare("SELECT * FROM post WHERE approvato=TRUE AND username=?");
    $risultato->bind_param("s", $username);
    $risultato->execute();
    if ($risultato->error != "")
    {
        $errore = mysqli_error($conn);
        $errore = ("Errore del database: " . $errore);
        throw new Exception($errore);
    }
    $risultato = $risultato->get_result();
    $array_post = risultato_array_post($risultato);//Contiene i post dell'utente


    $risultato = $conn->prepare("SELECT * FROM commento WHERE username=? ORDER BY timestamp ASC");
    $risultato->bind_param("s", $username);
    $risultato->execute();
    if ($risultato->error != "")
    {
        $errore = mysqli_error($conn);
        $errore = ("Errore del database: " . $errore);
        throw new Exception($errore);
    }
    $risultato = $risultato->get_result();
    $array_commenti = risultato_array_commento($risultato);//Contiene i commenti dell'utente
}
catch (Exception $e)
{
    echo $e->getMessage();
}