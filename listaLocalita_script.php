<?php

require_once "connessione.php";


//Ritorna, una sola volta, tutte le località diverse prese dai post, ordinate alfabeticamente per stato prima e per località poi
$errore = "";
$risultato = array();
$i = 0;
try
{
    $query = mysqli_query($conn, "SELECT DISTINCT stato, localita FROM post WHERE approvato=TRUE ORDER BY stato, localita");
    if ($query == FALSE)
    {
        $errore = "Errore del database:" . mysqli_error($conn);
        throw new Exception($errore);
    }

    $risultato = array();
    while (true)
    {
        $risultato_query = mysqli_fetch_array($query, MYSQLI_NUM);
        if ($risultato_query == NULL)
            break;
        if (isset($risultato[$risultato_query[0]]))
            array_push($risultato[$risultato_query[0]], $risultato_query[1]);
        else
            $risultato[$risultato_query[0]] = array($risultato_query[1]);
        //$risultato[$i][0]= $risultato_query[0];
        //$risultato[$i][1] = $risultato_query[1];

        $i++;
    }
}
catch (Exception $e)
{
    echo "ERRORE: " . $e->getMessage();
}

//La lista delle località si trova in $risultato
