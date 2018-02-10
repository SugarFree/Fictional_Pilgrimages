<?php
require_once "connessione.php";
require_once "funzioni.php";
//Contestualmente, applica le modifiche che l'amministratore ritiene di dover fare e approva il post

$titolo_opera=$_POST["titolo_opera"];
$descrizione=$_POST["descrizione"];
$latitudine=$_POST["latitudine"];
$longitudine=$_POST["longitudine"];
$stato=$_POST["stato"];
$indirizzo=$_POST["indirizzo"];
$localita=$_POST["localita"];
$id=$_POST["id"];//Id del post da modificare/approvare

$titolo_opera=trim(strip_tags($titolo_opera));
$descrizione=trim(strip_tags($descrizione));
$latitudine=trim(strip_tags($latitudine));
$longitudine=trim(strip_tags($longitudine));

$stato=trim(strip_tags($stato));
$indirizzo=trim(strip_tags($indirizzo));
$localita=trim(strip_tags($localita));


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
    if(empty($titolo_opera))
    {
        throw  new Exception("Inserisci il titolo del film o serie tv");
    }
    if(strlen($titolo_opera)>32)
    {
        throw  new Exception("Il titolo può essere lungo max 32 caratteri");
    }
    if(empty($descrizione))
    {
        throw  new Exception("Inserisci una descrizione");
    }
    if(empty($indirizzo))
    {
        throw  new Exception("Inserisci un indirizzo");//Non controllo la località perchè è facoltativa
    }
    if(empty($stato))
    {
        throw  new Exception("Inserisci uno stato");
    }
    if(strlen($stato)>32)
    {
        throw  new Exception("Lo stato può essere lungo max 32 caratteri");
    }
    if(strlen($indirizzo)>64)
    {
        throw  new Exception("L'indirizzo può essere lungo max 32 caratteri");
    }
    if(strlen($localita)>32)
    {
        throw  new Exception("La località può essere lunga max 32 caratteri");
    }

    if (!filter_var($latitudine, FILTER_VALIDATE_FLOAT))
    {
        throw  new Exception("Latitudine inserita non e' un numero");
    }

    if (($latitudine > 90) || ($latitudine < -90) )
    {
        throw  new Exception("Latitudine inserita deve essere compresa tra +90 e -90");
    }

    if (!filter_var($longitudine, FILTER_VALIDATE_FLOAT))
    {
        throw  new Exception("Longitudine inserita non e' un numero");
    }

    if (($longitudine > 180) || ($longitudine < -180) )
    {
        throw  new Exception("Longitudine inserita deve essere compresa tra +90 e -90");
    }

    $latitudine=round($latitudine, 4);//approssima latitudine e longitudine a 4 cifre decimali per farle stare nel DB
    $longitudine=round($longitudine, 4);
    $risultato = $conn->prepare("UPDATE post SET titolo_opera=?, descrizione=?, latitudine=?,longitudine=?, stato=?, indirizzo=?, localita=?, approvato=TRUE WHERE id=?");
    $risultato->bind_param("ssddsssi", $titolo_opera, $descrizione, $latitudine, $longitudine, $stato, $indirizzo, $localita, $id);
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
