<?php
require_once "connessione.php";
//Nella form di inserimento file va usata la sintassi <input type="file" multiple="multiple" name="filecaricati[]" /> altrimenti non va
$titolo_opera="X-Men";
$descrizione="post di prova";
$latitudine="22.1324";
$longitudine="33.6843";
$username="user";//$_SESSION["username"]
$stato="Burundi";
$indirizzo="Via Fasulla, 123, Bujumbura";
$localita="Quartiere di prova";

$titolo_opera=trim(strip_tags($titolo_opera));
$descrizione=trim(strip_tags($descrizione));
$latitudine=trim(strip_tags($latitudine));
$longitudine=trim(strip_tags($longitudine));

$stato=trim(strip_tags($stato));
$indirizzo=trim(strip_tags($indirizzo));
$localita=trim(strip_tags($localita));


try {
    if (!filter_var($latitudine, FILTER_VALIDATE_FLOAT))
    {
        throw  new Exception("Latitudine inserita non e' un numero");
    }


    if (($latitudine > 90) || ($latitudine < -90) )
    {
        throw  new Exception("Latitudine inserita deve essere mompresa tra +90 e -90");
    }


        if (!filter_var($longitudine, FILTER_VALIDATE_FLOAT))
    {
        throw  new Exception("Longitudine inserita non e' un numero");
    }

    if (($longitudine > 180) || ($longitudine < -180) )
    {
        throw  new Exception("Longitudine inserita deve essere mompresa tra +90 e -90");
    }


    $inserimento = $conn->prepare("INSERT INTO post (titolo_opera, descrizione, latitudine, longitudine, username, stato, indirizzo, localita) VALUES (?,?,?,?,?,?,?,?)");
    $inserimento->bind_param("ssddssss",$titolo_opera,$descrizione, $latitudine, $longitudine, $username, $stato, $indirizzo, $localita);
    $inserimento->execute();
    if ($inserimento->error != "")
    {

        throw new Exception( "Errore ritornato dal database:". $inserimento->error);
    }
    /*if (!isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error']))
    {
        throw new RuntimeException('Errore nel caricamento del/dei file: Parametri errati');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['upfile']['error']) {
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

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
            $finfo->file($_FILES['upfile']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ),
            true
        )) {
        throw new RuntimeException('Formato file non valido. Sono ammessi solo .jpg, .png e .gif');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file($_FILES['upfile']['tmp_name'], sprintf('./uploads/%s.%s', sha1_file($_FILES['upfile']['tmp_name']), $ext)))
    {
        throw new RuntimeException('Impossibile spostare il file caricato nella cartella apposita del server');
    }

    echo 'File caricato correttamente.';*/

}
catch (Exception $e)
{

    echo $e->getMessage();

}