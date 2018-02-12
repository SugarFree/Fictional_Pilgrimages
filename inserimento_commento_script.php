<?php
// Riceve l'id del post in cui commentare da un campo hidden nella form
session_start();
require_once "connessione.php";

$username = $_SESSION["username"];
$id_post = $_POST["id_post"];
$testo = $_POST["testo"];

$id_post = trim(strip_tags($id_post));
$testo = trim(strip_tags($testo));

try
{
    if (empty($_SESSION["username"]))
        throw  new Exception("Devi loggarti per poter effettuare questa azione");

    $inserimento = $conn->prepare("INSERT INTO commento (id_post, username, testo) VALUES (?,?,?)");
    $inserimento->bind_param("sss", $id_post, $username, $testo);
    $inserimento->execute();
    if ($inserimento->error != "")
        throw new Exception("Errore ritornato dal <span lang='en'>database</span>:" . $inserimento->error);

    header("Location: post.php?id=$id_post#commenti");
}
catch (Exception $e)
{
    echo 'ERRORE: ' . $e->getMessage();
    header("Refresh: 3; URL=post.php?id=$id_post");
}
?>