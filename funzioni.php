<?php
/**
 * Contiene funzioni necessarie per le altre pagine PHP.
 */
require_once "opera.php";
require_once "post.php";
require_once "commento.php";
require_once "connessione.php";

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
        $array_post[$i]=new post($value["id"], $value["titolo_opera"], $value["descrizione"], $value["latitudine"], $value["longitudine"], $value["username"], $value["stato"],$value["indirizzo"], $value["localita"]);
        $i++;
    }
    return $array_post;
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
        $array_opere[$i]=new opera($value["titolo"],$value["descrizione"],$value["tipo"]);
        $i++;
    }
    return $array_opere;
}

/**
 * @param  mysqli_result $risultato Il risultato della query SELECT nella tabella post
 * @return mixed $post L'oggetto di tipo post rappresentante il post con l'id richiesto
 */
function risultato_singolo_post($risultato)
{
    if($risultato->num_rows==0) return FALSE;
    $risultato=mysqli_fetch_array($risultato,MYSQLI_ASSOC);
    $post=new post($risultato["id"], $risultato["titolo_opera"], $risultato["descrizione"], $risultato["latitudine"], $risultato["longitudine"], $risultato["username"], $risultato["stato"],$risultato["indirizzo"], $risultato["localita"]);

    return $post;
}


/**
 * @param mysqli_result $risultato Il risultato della query SELECT nella tabella commento
 * @return mixed array Un array di oggetti commento o FALSE se la query contiene zero risultati
 */
function risultato_array_commento($risultato)
{
    if($risultato->num_rows==0) return FALSE;
    $i=0;
    $risultato=mysqli_fetch_all($risultato,MYSQLI_ASSOC);
    foreach ($risultato as $value)
    {
        $array_commenti[$i]=new commento($value["id_post"],$value["username"], $value["testo"],$value["timestamp"]);
        $i++;
    }
    return $array_commenti;

}

/**
 * @param string $username l'utente del quale occorre verificare il livello di privilegio (user/admin)
 * @return bool Vero se l'utente è amministratore, falso se non lo è o se risulta impossibile determinarlo (es. connessione al db persa)
 */
function amministratore($username)
{
    global $conn;
    try
    {
        $verifica_username = $conn->prepare("SELECT username FROM utente WHERE username=? AND privilegi='admin'");
        $verifica_username->bind_param("s", $username);
        $verifica_username->execute();
        if ($verifica_username->error != "")
        {
            throw new Exception( "Errore ritornato dal database:" . $verifica_username->error);
        }

        $risultato_username = $verifica_username->get_result();
        if ($risultato_username->num_rows === 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    catch (Exception $e)
    {
        return false;
    }
}
