<?php
require_once "connessione.php";
require_once "funzioni.php";
//require_once "commento.php";

if (isset($_GET["id"]))
{
    $id = $_GET["id"];
    try
    {
        //Per la parte del post
        $risultato_post = $conn->prepare("SELECT * FROM post WHERE approvato=TRUE AND id=?");
        $risultato_post->bind_param("i", $id);
        $risultato_post->execute();
        if ($risultato_post->error != "")
        {
            $errore = mysqli_error($conn);
            $errore = ("Errore del <span lang='en'>database</span>: " . $errore);
            throw new Exception($errore);
        }
        $risultato_post = $risultato_post->get_result();

        $risultato_post = risultato_singolo_post($risultato_post);//$risultato_post contiene l'oggetto post che rapppresenta l'oggetto in questione


        //Per la parte dei commenti
        $risultato_commenti = $conn->prepare("SELECT * FROM commento WHERE id_post=? ORDER BY timestamp ASC");
        $risultato_commenti->bind_param("i", $id);
        $risultato_commenti->execute();
        if ($risultato_commenti->error != "")
        {
            $errore = mysqli_error($conn);
            $errore = ("Errore del <span lang='en'>database</span>: " . $errore);
            throw new Exception($errore);
        }
        $risultato_commenti = $risultato_commenti->get_result();


        $risultato_commenti = risultato_array_commento($risultato_commenti);//$risultato contiene l'array di oggetti commento relativi al post che si sta visualizzando
    }
    catch (Exception $e)
    {
        echo "ERRORE: " . $e->getMessage();
    }
}
?>