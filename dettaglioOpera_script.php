<?php
require_once ("connessione.php");
require_once ("funzioni.php");

$titolo=trim(strip_tags($_GET["nome"]));
try
{
    //Se questi due check passano, controllo se l'email o l'username erano già presenti nel db
    $query_opera = $conn->prepare("SELECT * FROM opera WHERE titolo=?");
    $query_opera->bind_param("s", $titolo);
    $query_opera->execute();

//Se la query fallisce per qualsiasi motivo, esce
    if ($query_opera->error != "")
    {

        throw  new  Exception("Errore ritornato dal database:" .$query_opera->error);
    }
    else
    {
        $risultato_opera = $query_opera->get_result();
        $opera=risultato_singola_opera($risultato_opera);//$opera contiene l'oggetto opera da mostrare. Se è FALSE significa che si sta richiedendo un'opera inesistente o qualcosa è andato storto.
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}