<?php
require_once "connessione.php";
session_start();
$titolo_opera=$_POST["titolo_opera"];
$descrizione=$_POST["descrizione"];
$latitudine=$_POST["latitudine"];
$longitudine=$_POST["longitudine"];
$username=$_SESSION["username"];
$stato=$_POST["stato"];
$indirizzo=$_POST["indirizzo"];
$localita=$_POST["localita"];

$titolo_opera=trim(strip_tags($titolo_opera));
$descrizione=trim(strip_tags($descrizione));
$latitudine=trim(strip_tags($latitudine));
$longitudine=trim(strip_tags($longitudine));

$stato=trim(strip_tags($stato));
$indirizzo=trim(strip_tags($indirizzo));
$localita=trim(strip_tags($localita));


try {
    if(empty($titolo_opera))
    {
        throw  new Exception("Inserisci il titolo del film o serie tv");
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
    if(empty($_SESSION["username"]))
    {
        throw  new Exception("Devi loggarti per poter effettuare questa azione");
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


    $inserimento = $conn->prepare("INSERT INTO post (titolo_opera, descrizione, latitudine, longitudine, username, stato, indirizzo, localita) VALUES (?,?,?,?,?,?,?,?)");
    $inserimento->bind_param("ssddssss",$titolo_opera,$descrizione, $latitudine, $longitudine, $username, $stato, $indirizzo, $localita);
    $inserimento->execute();
    if ($inserimento->error != "")
    {

        throw new Exception( "Errore ritornato dal database:". $inserimento->error);
    }

    $numero_nuovo_post = mysqli_query($conn, "SELECT max(id) FROM post");//Prende il numero dell'ultimo post caricato (cioè  quello appena caricato dall'utente)
    $risultato_query=mysqli_fetch_assoc($numero_nuovo_post);
    $numero_nuovo_post=$risultato_query["max(id)"];

    if (!file_exists('uploads')) //crea la cartella per tenere le foto se non esiste
    {
        mkdir('uploads', 0777, true);
    }

    //-----------------CARICAMENTO IMMAGINE 1

    if (!isset($_FILES['immagine_film']['error']) || is_array($_FILES['immagine_film']['error']))
    {
        throw new RuntimeException('Errore nel caricamento del/dei file: Parametri errati');
    }

    switch ($_FILES['immagine_film']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('Non hai inviato alcun file');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Superato limite di peso file');
        default:
            throw new RuntimeException('Altro errore non specificato nel caricamento dei file');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
            $finfo->file($_FILES['immagine_film']['tmp_name']),
            array(
                'jpg' => 'image/jpeg'
            ),
            true
        )) {
        throw new RuntimeException('Formato file non valido. Sono ammessi solo .jpg');
    }

    //il file viene messo in /uploads/numerodelpost.estensione.
    if (!move_uploaded_file($_FILES['immagine_film']['tmp_name'], sprintf('./uploads/%s.%s', $numero_nuovo_post, $ext)))
    {
        throw new RuntimeException('Impossibile spostare il file caricato nella cartella apposita del server');
    }

    echo 'File dal film caricato correttamente.';

    if (!isset($_FILES['immagine_reale']['error']) || is_array($_FILES['immagine_reale']['error']))
    {
        throw new RuntimeException('Errore nel caricamento del/dei file: Parametri errati');
    }



    //-----------CARICAMENTO IMMAGINE 2

    switch ($_FILES['immagine_reale']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('Non hai inviato alcun file');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Superato limite di peso file');
        default:
            throw new RuntimeException('Altro errore non specificato nel caricamento dei file');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
            $finfo->file($_FILES['immagine_reale']['tmp_name']),
            array(
                'jpg' => 'image/jpeg'
            ),
            true
        )) {
        throw new RuntimeException('Formato file non valido. Sono ammessi solo .jpg');
    }

//il file viene messo in /uploads/numerodelpostA.estensione.
    if (!move_uploaded_file($_FILES['immagine_reale']['tmp_name'], sprintf('./uploads/%s.%s', $numero_nuovo_post.'A', $ext)))
    {
        throw new RuntimeException('Impossibile spostare il file caricato nella cartella apposita del server');
    }

    echo 'File reale caricato correttamente.';

}
catch (RuntimeException $e)
{
    $numero_nuovo_post = mysqli_query($conn, "SELECT max(id) FROM post");//Prende il numero dell'ultimo post caricato (cioè  quello appena caricato dall'utente)
    $risultato_query=mysqli_fetch_assoc($numero_nuovo_post);
    $numero_nuovo_post=$risultato_query["max(id)"];
    $elimina_post=mysqli_query($conn,"DELETE from post WHERE id=$numero_nuovo_post");//cancella il post se il caricamento di un'immagine fallisce
    if (file_exists("uploads/".$numero_nuovo_post.".jpg")) { unlink ("uploads/".$numero_nuovo_post.".jpg"); }//Cancella le immagini se il caricamento di una delle due fallisce
    if (file_exists("uploads/".$numero_nuovo_post."A.jpg")) { unlink ("uploads/".$numero_nuovo_post."A.jpg"); }
    echo $e->getMessage();

}
catch (Exception $e)
{

    echo $e->getMessage();

}
