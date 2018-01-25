<?php
require_once "connessione.php";


//Ritorna, una sola volta, tutti i titoli delle opere dei post 
$errore="";
$risultato=array();
$i=0;
$query=mysqli_query($conn, "SELECT DISTINCT titolo_opera FROM post WHERE approvato=TRUE");
if ($query==FALSE)
{
	$errore="Errore del database:".mysqli_error();
	die($errore);
}

while (true) {
    $risultato_query=mysqli_fetch_array($query, MYSQLI_NUM);
	if($risultato_query==NULL) break;
   $risultato[$i]= $risultato_query[0];

    $i++; }

var_dump($risultato);
