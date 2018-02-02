<?php

class commento
{
    var $idPost;
    var $username;
    var $testo;
    var $timestamp;

    function __construct ($idPost, $username, $testo, $timestamp)
    {
        $this->idPost=$idPost;
        $this->username=$username;
        $this->testo=$testo;
        $this->timestamp=date('M j Y g:i A', strtotime($timestamp));//Eventualmente cambiare formato
    }
}