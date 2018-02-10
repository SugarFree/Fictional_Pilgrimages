<?php
session_start();
require_once "connessione.php";

$titolo = trim(strip_tags($_POST["titolo"]));
$descrizione = trim(strip_tags($_POST["descrizione"]));
$tipo = $_POST["tipo"];


try
{
    if (!isset($_SESSION["username"]))
    {
        throw  new  Exception("Devi loggarti per poter effettuare questa azione");
    }
    if (($tipo != "film") and ($tipo != "serietv"))
    {
        throw  new  Exception("Dati inviati in modo non corretto");
    }
    if (strlen($titolo) > 32)
    {
        throw  new  Exception("Titolo troppo lungo: max 32 caratteri");
    }
    $verifica_titolo = $conn->prepare("SELECT * FROM opera WHERE titolo=?");//Verifica che il titolo che l'utente vuole inserire non esista già
    $verifica_titolo->bind_param("s", $titolo);
    $verifica_titolo->execute();
    if ($verifica_titolo->error != "")
    {
        throw  new  Exception("Errore ritornato dal database:" . $verifica_titolo->error);
    }
    $risultato_titolo = $verifica_titolo->get_result();
    if ($risultato_titolo->num_rows === 0)
    {
        $inserisci_post = $conn->prepare("INSERT INTO opera VALUES (?,?,?)");
        $inserisci_post->bind_param("sss", $titolo, $descrizione, $tipo);
        $inserisci_post->execute();
        if ($inserisci_post->error != "")
        {
            throw  new  Exception("Errore ritornato dal database:" . $verifica_titolo->error);
        }
    }
    else
    {
        throw  new  Exception("Titolo già presente nel sito");
    }
}
catch (Exception $e)
{
    echo 'ERRORE: ' . $e->getMessage();
}
