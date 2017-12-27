    <?php

    require_once 'connessione.php';

    $username = $password = $email = $conferma_password = "";

    /*Contengono i messaggi d'errore da mostrare all'utente
      Se sono tutte stringhe vuote, l'operazione è andata a buon fine.
    */
    $errore_username = $errore_password = $errore_conferma_password = $errore_email = $errore_misc = "";

    //parametri in input per test
    $username="user2";
    $password="prova1";
    $conferma_password="prova1";
    $email="fai@cagare.com";
    $privilegi="user";

    //Verifico che l'email sia nel formato corretto
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errore_email="Formato indirizzo email errato";
        die($errore_email);
    }

    //Verifico che la password sia ripetuta correttamente in entrambi i campi
    if($password!=$conferma_password)
    {
        $errore_conferma_password="Password non ripetuta correttamente";
        die($errore_conferma_password);
    }

    //Se questi due check passano, controllo se l'email o l'username erano già presenti nel db
    $verifica_email = $conn->prepare("SELECT email from utente WHERE email=?");
    $verifica_email->bind_param("s",$email);
    $verifica_email->execute();
    $risultato_email=$verifica_email->get_result();

    //Se l'email è nuova, tutto ok, altrimenti esce
    if($risultato_email->num_rows===0)
    {
        $verifica_email->close();
        //echo "Non ci sono email corrispondenti";
        //Una volta verificata l'email, passa a controllare che l'username non sia già stato scelto da qualcun altro
        $verifica_username = $conn->prepare("SELECT username from utente WHERE username=?");
        $verifica_username->bind_param("s",$username);
        $verifica_username->execute();
        $risultato_username=$verifica_username->get_result();

        if($risultato_username->num_rows===0)
        {
            //Se l'username è nuovo, inserisce il nuovo utente nel db
            $verifica_username->close();
            //echo "Non ci sono username corrispondenti";
            $inserimento = $conn->prepare("INSERT INTO utente VALUES (?,?,?,?)");
            $inserimento->bind_param("ssss", $username,$email,sha1($password),$privilegi);
            $inserimento->execute();
            if($inserimento->error!="")
            {
                $errore_misc="Errore ritornato dal database:". $inserimento->error;
                $inserimento->close();
                $conn->close();
                die($errore_misc);
            }
            $inserimento->close();
            $conn->close();
        }
        else
        {
            //Se l'username è già esistente esce
            //echo "Un username corrisponde";
            $verifica_username->close();
            $conn->close();
            $errore_username="Username gia' esistente, per favore sceglierne un altro";
            die($errore_username);
        }
    }
    else
    {
        //echo "Un'email corrisponde";
        $verifica_email->close();
        $conn->close();
        $errore_email="Email relativa ad un'account gia' esistente. Recarsi alla pagina di Login.";
        die($errore_email);
    }
    ?>