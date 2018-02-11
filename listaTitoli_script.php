<?php
require_once "connessione.php";


//Ritorna, una sola volta, tutti i titoli delle opere dei post (quindi non inclusi i titoli presenti solo in post non approvati o non presenti in alcun post)
$errore = "";
$risultato = array();
$i = 0;
try
{
    $query = mysqli_query($conn, "SELECT DISTINCT titolo_opera FROM post WHERE approvato=TRUE");
    if ($query == FALSE)
    {
        $errore = "Errore del database:" . mysqli_error($conn);
        throw new Exception($errore);
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
    echo "ERRORE: " . $e->getMessage();
}

//La lista dei titoli si trova in $risultato
