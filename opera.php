<?php
/*Classe Opera: Rappresenta un'opera nel sito.
* Serve a chi dovrà trasformare il risultato della ricerca (fornito come vettore di oggetti opera)
 *in una pagina html. Oppure nel caso del dettaglio di un'opera soltanto viene ritornato un solo oggetto.
*/

class opera
{
    var $id;
    var $titolo;
    var $descrizione;
    var $tipo;


    /**
     * Costruttore dell'oggetto opera.
     * Tipicamente si presuppone che i dati gli arrivino dal risultato di una query "SELECT", già nel formato corretto,
     * quindi non ci sono controlli/property/getter/setter ecc.
     */
    function __construct($id, $titolo, $descrizione, $tipo)
    {
        $this->tipo=$tipo;
        $this->titolo=$titolo;
        $this->descrizione=$descrizione;
    }
}

