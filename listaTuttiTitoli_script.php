<?php
//Ritorna, una sola volta, tutti i titoli delle opere inserite, anche di quelle che non sono utilizzate in nessun post
require_once "connessione.php";
$i = 0;
try
{
    $query = mysqli_query($conn, "SELECT titolo FROM opera ORDER BY titolo ASC ");
    if ($query == FALSE)
    {
        throw new Exception("Errore del database:" . mysqli_error($conn));
    }

    while (true)
    {
        $risultato_query = mysqli_fetch_array($query, MYSQLI_NUM);
        if ($risultato_query == NULL)
            break;
        $risultato[$i] = $risultato_query[0];

        $i++;
    }
}
catch (Exception $e)
{
    $risultato = array();
}

//La lista dei titoli si trova in $risultato