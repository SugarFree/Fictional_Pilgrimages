<?php
error_reporting(E_ALL & ~E_NOTICE);
$redirect_location = (isset($_POST["destination"]) ? $_POST["destination"] : "connettiti.php");
session_start();
try
{
    if (isset($_SESSION['username'])) // Se l'utente risulta già loggato, mostra un messaggio adeguato
        Throw new Exception("Utente già loggato, esegui il <span lang='en'>logout</span> prima.");
    else
    { // Altrimenti va col login
        require_once 'connessione.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hashed_psw = sha1($password);

        // Se l'username o la password inseriti sono vuoti, avvisa l'utente
        if (empty($username))
            throw new Exception("Inserisci un <span lang='en'>username</span>");
        if (empty($password))
            throw new Exception("Inserisci una <span lang='en'>password</span>");

        // Verifica se la combinazione di username e password inserita è corretta
        $verifica_login = $conn->prepare("SELECT username, password, privilegi FROM utente WHERE username=? AND password=?");
        $verifica_login->bind_param("ss", $username, $hashed_psw);
        $verifica_login->execute();

        // Se la query per qualche motivo fallisce, mostra un messaggio di errore ed esce
        if ($verifica_login->error != "")
            throw new Exception("Errore del <span lang='en'>database</span>:" . $verifica_login->error);

        $risultato_login = $verifica_login->get_result();
        if ($risultato_login->num_rows == 1)
        { // Se corrisponde ai dati presenti nel db si logga come quello specifico utente
            $_SESSION["username"] = $username;
            $_SESSION["rango"]=$risultato_login->fetch_array(MYSQLI_NUM)[2];
            header("Refresh: 3; URL=$redirect_location");
            echo("Hai effettuato l'accesso come " . $_SESSION['username'] . ". Tra 3 secondi verrai reindirizzato.");

            $verifica_login->close();
            $conn->close();
        }
        else //Altrimenti mostra messaggio di errore ed esce
            throw new Exception("Combinazione di nome utente e <span lang='en'>password</span> errata.");
    }
}
catch (Exception $e)
{
	header("Refresh:3; URL=$redirect_location");
    echo "ERRORE: " . $e->getMessage() . " Tra 3 secondi verrai reindirizzato.";
}
?>