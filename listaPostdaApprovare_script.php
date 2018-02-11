<?php
session_start();
require_once "connessione.php";
require_once "post.php";
require_once "funzioni.php";
//Salva tutti i post in attesa di approvazione nell'array $array_post
try
{
    if (!isset($_SESSION["username"]))
    {
        throw  new  Exception("Devi loggarti per poter effettuare questa azione");
    }
    if (!amministratore($_SESSION["$username"]))
    {
        throw  new  Exception("Devi essere un amministratore per poter effettuare questa azione");
    }
    $risultato = mysqli_query($conn, "SELECT * FROM post WHERE approvato=FALSE");

    if (mysqli_error($conn) != "")
    {
        throw new Exception("Errore del database:" . mysqli_error($conn));
    }
    $array_post = risultato_array_post($risultato);//Contiene i post in attesa di approvazione
}
catch (Exception $e)
{
    echo $e->getMessage();
}
