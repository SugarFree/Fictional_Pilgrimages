<?php
require_once "connessione.php";
require_once "funzioni.php";

//$stato=$_GET["stato"];
$stato = "";
$localita = $_GET["nome"];
$errore = "";

$stato = trim(strip_tags($stato));
$localita = "%" . trim(strip_tags($localita)) . "%";


/*Di seguito tutti i casi possibili. Lo stato deve essere uguale perchè viene da un option value, la località deve solo
  contenere la stringa cercata in quanto viene inserita in una textbox
*/
try
{
    if (empty($stato) and empty($localita))//Se entrambi i campi sono vuoti, ritorna tutti i post
    {
        //Non occorre usare un prepared statement perchè non ci sono input di nessun tipo

        $risultato = mysqli_query($conn, "SELECT * FROM post WHERE approvato=TRUE");
        if ($risultato == FALSE)
        {
            $errore = mysqli_error($conn);
            throw new Exception("Errore del database: " . $errore);
        }
    }
    else if (empty($localita) and !empty($stato))
    {

        $risultato = $conn->prepare("SELECT * FROM post WHERE approvato=TRUE AND stato=?");
        $risultato->bind_param("s", $stato);
        $risultato->execute();
        if ($risultato->error != "")
        {
            $errore = mysqli_error($conn);
            $errore = ("Errore del database: " . $errore);
            throw new Exception($errore);
        }
        $risultato = $risultato->get_result();
    }
    else if (!empty($localita) and empty($stato))
    {

        $risultato = $conn->prepare("SELECT * FROM post WHERE approvato=TRUE AND localita LIKE ?");
        $risultato->bind_param("s", $localita);
        $risultato->execute();
        if ($risultato->error != "")
        {
            $errore = mysqli_error($conn);
            $errore = ("Errore del database: " . $errore);
            throw new Exception($errore);
        }
        $risultato = $risultato->get_result();
    }
    else
    {
        $risultato = $conn->prepare("SELECT * FROM post WHERE approvato=TRUE AND localita LIKE ? AND stato=?");
        $risultato->bind_param("ss", $localita, $stato);
        $risultato->execute();
        if ($risultato->error != "")
        {
            $errore = mysqli_error($conn);
            $errore = ("Errore del database: " . $errore);
            throw new Exception($errore);
        }
        $risultato = $risultato->get_result();
    }

    //L'array di oggetti "post" si trova in $risultato
    $risultato = risultato_array_post($risultato);
}
catch (Exception $e)
{
    echo $e->getMessage();
}