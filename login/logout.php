<?php
//Session wird Gestartet
session_start();
//Alles Sessions werden zerst�rt
session_destroy();
//Weiterleitung auf die Startseite
header('Location: '.$uri.'/Schnupperverwaltung/');
?>