<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once 'connessione.php';
$redirect_location = (isset($_POST["destination"]) ? $_POST["destination"] : "connettiti.php");
session_start();

//Questi sono i parametri da passare tramite form
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$conferma_password = $_POST["conferma_password"];

/*Contengono i messaggi d'errore da mostrare all'utente
  Se sono tutte stringhe vuote, l'operazione è andata a buon fine.
  Errore di username già esistente/vuoto, errore password vuota,
  errore di password non ripetuta correttamente, errore di email in formato non corretto,
  errore del database generico, ad esempio è pieno, non risponde ecc.
*/
$hashed_psw = sha1($password);
$errore = "";

/*Rimuove qualsiasi tag HTML/PHP per evitare che l'utente faccia scherzi strani, tipo avere il suo nome in grassetto
  Rimuove anche gli spazi iniziali e finali per l'username, nella password sono ammessi*/
$username = trim(strip_tags($username));
$conferma_password = strip_tags($conferma_password);
$email = strip_tags($email);
/*parametri in input per test
$username="user";
$password="prova1";
$conferma_password="prova1";
$email="prova@email.com";*/
$privilegi = "user"; // Questo va lasciato così sempre, non si possono registrare nuovi admin

try
{
    //Verifica che username e password inseriti non siano vuoti
    if (empty($username))
        throw new Exception("Inserire un username.");
    if (empty($password))
        throw new Exception("Inserire una password.");

    //Verifico che l'email sia nel formato corretto
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        throw  new Exception("Formato indirizzo email errato.");

    //Verifico che la password sia ripetuta correttamente in entrambi i campi
    if ($password != $conferma_password)
        throw new Exception("Password non ripetuta correttamente.");

    //Se questi due check passano, controllo se l'email o l'username erano già presenti nel db
    $verifica_email = $conn->prepare("SELECT email FROM utente WHERE email=?");
    $verifica_email->bind_param("s", $email);
    $verifica_email->execute();

    //Se la query fallisce per qualsiasi motivo, esce
    if ($verifica_email->error != "")
        throw  new  Exception("Errore ritornato dal database:" . $verifica_email->error . ".");

    $risultato_email = $verifica_email->get_result();
    //Se l'email è nuova, tutto ok, altrimenti esce
    if ($risultato_email->num_rows === 0)
    {
        $verifica_email->close();
        //echo "Non ci sono email corrispondenti";
        //Una volta verificata l'email, passa a controllare che l'username non sia già stato scelto da qualcun altro
        $verifica_username = $conn->prepare("SELECT username FROM utente WHERE username=?");
        $verifica_username->bind_param("s", $username);
        $verifica_username->execute();

        //Se la query fallisce per qualsiasi motivo, esce
        if ($verifica_username->error != "")
            throw new Exception("Errore ritornato dal database:" . $verifica_username->error . ".");
        $risultato_username = $verifica_username->get_result();

        if ($risultato_username->num_rows === 0)
        {
            //Se l'username è nuovo, inserisce il nuovo utente nel db
            $verifica_username->close();
            //echo "Non ci sono username corrispondenti";
            $inserimento = $conn->prepare("INSERT INTO utente VALUES (?,?,?,?)");
            $inserimento->bind_param("ssss", $username, $email, $hashed_psw, $privilegi);
            $inserimento->execute();

            //Se per qualche altro motivo il database si è rifiutato di inserire il nuovo utente, salva il messaggio d'errore ed esce
            if ($inserimento->error != "")
            {
                $inserimento->close();
                $conn->close();
                throw new Exception("Errore ritornato dal database:" . $inserimento->error . ".");
            }
            $inserimento->close();
            $conn->close();
        }
        else
        {
            //Se l'username è già esistente esce
            $verifica_username->close();
            $conn->close();
            throw new Exception("Username gia' esistente, per favore sceglierne un altro.");
        }
    }
    else
    {
        $verifica_email->close();
        $conn->close();
        throw  new Exception("Email relativa ad un account gia' esistente.");
    }

    /*Se il flusso del programma arriva fin qui senza aver innescato alcuna eccezione
      significa che l'utente ha inserito tutto correttamente ed è stato registrato.
      Si procede dunque a fare il login con l'account appena creato e a reindirizzarlo.
    */
    $_SESSION["username"] = $username;
    header("Refresh: 3; $redirect_location");
    echo("Registrazione effettuata con successo. Tra 3 secondi sarai reindirizzato.");
}


catch (Exception $e)
{
    echo "ERRORE: " . $e->getMessage() . "Tra 3 secondi verrai reindirizzato.";
    header("Refresh: 3; $redirect_location");
}


?>
