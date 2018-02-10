<?php
/*Classe Opera: Rappresenta un'opera nel sito.
* Serve a chi dovrà trasformare il risultato della ricerca (fornito come vettore di oggetti opera)
 *in una pagina html. Oppure nel caso del dettaglio di un'opera soltanto viene ritornato un solo oggetto.
*/

class opera
{
    var $titolo;
    var $descrizione;
    var $tipo;


    /**
     * Costruttore dell'oggetto opera.
     * Tipicamente si presuppone che i dati gli arrivino dal risultato di una query "SELECT", già nel formato corretto,
     * quindi non ci sono controlli/property/getter/setter ecc.
     */
    function __construct($titolo_inserito, $descrizione_inserita, $tipo_inserito)
    {

            $this->tipo = $tipo_inserito;
            $this->titolo = $titolo_inserito;
            $this->descrizione = $descrizione_inserita;
    }
}

