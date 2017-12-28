    <?php

    require_once 'connessione.php';

    //Questi sono i parametri da passare tramite form
    $username = $password = $email  = $conferma_password = "";

    /*Contengono i messaggi d'errore da mostrare all'utente
      Se sono tutte stringhe vuote, l'operazione è andata a buon fine.
      Rispettivamente errore di username già esistente/vuoto, errore password vuota,
      errore di password non ripetuta correttamente, errore di email in formato non corretto,
      errore del database generico, ad esempio è pieno, non risponde ecc.
    */
    $errore_username  = $errore_conferma_password = $errore_password = $errore_email = $errore_misc = "";

    //Rimuove qualsiasi tag HTML/PHP per evitare che l'utente faccia scherzi strani, tipo avere il suo nome in grassetto
    $username=strip_tags($username);
    $password=strip_tags($password);
    $conferma_password=strip_tags($conferma_password);
    $email=strip_tags($email);
    /*parametri in input per test
    $username="user";
    $password="prova1";
    $conferma_password="prova1";
    $email="prova@email.com";*/

    $privilegi="user";//Questo va lasciato così sempre, non si possono registrare nuovi admin

    //Verifica che username e password inseriti non siano vuoti
    if (empty($username))
        {
            $errore_username=("Inserire un username");
            die($errore_username);
        }

    if (empty($password))
    {
        $password=("Inserire una password");
        die($errore_password);
    }

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

    //Se la query fallisce per qualsiasi motivo, esce
    if ($verifica_email->error!="")
    {
        $errore_misc="Errore ritornato dal database:" . $verifica_email->error;
        die($errore_misc);
    }
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

        //Se la query fallisce per qualsiasi motivo, esce
        if ($verifica_username->error!="")
        {
            $errore_misc="Errore ritornato dal database:" . $verifica_username->error;
            die($errore_misc);
        }
        $risultato_username=$verifica_username->get_result();

        if($risultato_username->num_rows===0)
        {
            //Se l'username è nuovo, inserisce il nuovo utente nel db
            $verifica_username->close();
            //echo "Non ci sono username corrispondenti";
            $inserimento = $conn->prepare("INSERT INTO utente VALUES (?,?,?,?)");
            $inserimento->bind_param("ssss", $username,$email,sha1($password),$privilegi);
            $inserimento->execute();
            //Se per qualche altro motivo il database si è rifiutato di inserire il nuovo utente, salva il messaggio d'errore ed esce
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
        $errore_email="Email relativa ad un account gia' esistente. Recarsi alla pagina di Login.";
        die($errore_email);
    }
    ?>