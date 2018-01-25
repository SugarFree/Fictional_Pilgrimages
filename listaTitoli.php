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
$risultato_query=mysqli_fetch_array($query, MYSQLI_NUM); //Se e' null significa che non ci sono titoli

foreach ($risultato_query as $value)
{
	$risultato=$value[i];
	i++;
}
var_dump($risultato);
