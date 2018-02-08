<?php
session_start();
/*Cancella un post in attesa di approvazione (Ad esempio perchè offensivo)
NON utilizzare su post già approvati: non è prevista la loro cancellazione dal database
*/
require_once "connessione.php";
require_once "funzioni.php";
$id=$_POST["id"];
try
{
    if(empty($_SESSION["username"]))
    {
        throw  new Exception("Devi loggarti per poter effettuare questa azione");
    }
    if(!amministratore($_SESSION["username"]))
    {
        throw  new Exception("Devi essere un amministratore per poter effettuare questa azione");
    }
    $risultato = $conn->prepare("DELETE FROM post WHERE id=? AND approvato=FALSE ");
    $risultato->bind_param("i",  $id);
    $risultato->execute();
    if ($risultato->error != "")
    {
        throw new Exception("Errore del database:" .$risultato->error);
    }

}
catch (Exception $e)
{
    echo $e->getMessage();
}

