<?php
/**
 * Contiene funzioni necessarie per le altre pagine PHP.
 */
require_once "opera.php";
require_once "post.php";

/**
 * @param $risultato mysqli_result Il risultato della query SELECT nella tabella post
 * @return mixed Un array di oggetti di tipo post o FALSE se la query contiene zero risultati
 */
function risultato_array_post($risultato)
{
    if($risultato->num_rows==0) return FALSE;
    $i=0;
    $risultato=mysqli_fetch_all($risultato,MYSQLI_ASSOC);
    foreach ($risultato as $value)
    {
        $array_oggetti[$i]=new post($value["id"], $value["titolo_opera"], $value["descrizione"], $value["latitudine"], $value["longitudine"], $value["username"], $value["stato"],$value["indirizzo"], $value["localita"]);
        $i++;
    }
    return $array_oggetti;
}

/**
 * @param mysqli_result $risultato Il risultato della query SELECT nella tabella post
 * @return mixed array Un array di oggetti di tipo opera o FALSE se la query contiene zero risultati
 */
function risultato_array_opera($risultato)
{
    if($risultato->num_rows==0) return FALSE;
    $i=0;
    $risultato=mysqli_fetch_all($risultato,MYSQLI_ASSOC);
    foreach ($risultato as $value)
    {
        $array_oggetti[$i]=new opera($value["titolo"],$value["descrizione"],$value["tipo"]);
        $i++;
    }
    return $array_oggetti;
}