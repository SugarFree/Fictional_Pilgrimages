<?php
/*Classe Post: Rappresenta un post nel sito.
* Serve a chi dovrà trasformare il risultato della ricerca (fornito come vettore di oggetti post)
 *in una pagina html, oppure nel caso del dettaglio di un post soltanto viene ritornato un solo oggetto.
*/

class post
{
    var $id;
    var $titolo_opera;
    var $descrizione;
    var $latitudine;
    var $longitudine;
    var $username;
    var $stato;
    var $indirizzo;
    var $localita;
    //var $approvato; Non serve mai mostrarla all'utente

    /**
     * Costruttore dell'oggetto post.
     * Tipicamente si presuppone che i dati gli arrivino dal risultato di una query "SELECT", già nel formato corretto,
     * quindi non ci sono controlli/property/getter/setter ecc.
     */
    function __construct($id, $titolo_opera, $descrizione, $latitudine, $longitudine, $username, $stato, $indirizzo, $localita)
    {
        $this->id=$id;
        $this->titolo_opera=$titolo_opera;
        $this->descrizione=$descrizione;
        $this->latitudine=$latitudine;
        $this->longitudine=$longitudine;
        $this->username=$username;
        $this->stato=$stato;
        $this->indirizzo=$indirizzo;
        $this->localita=$localita;
    }
}

