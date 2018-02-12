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
	if (empty($titolo))
	{
		throw  new  Exception("Il titolo non pu&ograve; essere vuoto");
	}
    if (strlen($titolo) > 32)
    {
        throw  new  Exception("Titolo troppo lungo: massimo 32 caratteri");
    }
    $verifica_titolo = $conn->prepare("SELECT * FROM opera WHERE titolo=?");//Verifica che il titolo che l'utente vuole inserire non esista già
    $verifica_titolo->bind_param("s", $titolo);
    $verifica_titolo->execute();
    if ($verifica_titolo->error != "")
    {
        throw  new  Exception("Errore ritornato dal <span lang='en'>database</span>:" . $verifica_titolo->error);
    }
    $risultato_titolo = $verifica_titolo->get_result();
    if ($risultato_titolo->num_rows === 0)
    {
        $inserisci_post = $conn->prepare("INSERT INTO opera VALUES (?,?,?)");
        $inserisci_post->bind_param("sss", $titolo, $descrizione, $tipo);
        $inserisci_post->execute();
        if ($inserisci_post->error != "")
        {
            throw  new  Exception("Errore ritornato dal <span lang='en'>database</span>:" . $verifica_titolo->error);
        }
    }
    else
    {
        throw  new  Exception("Titolo gi&agrave; presente nel sito");
    }
	header("Refresh: 3; URL=upload.php");
	echo("Opera aggiunta con successo. Tra 3 secondi verrai reindirizzato.");

}
catch (Exception $e)
{
	header("Refresh: 5; URL=aggiungi_opera.php");
    echo 'ERRORE: ' . $e->getMessage() . ". Tra 5 secondi verrai reindirizzato.";
}
