<?php
/*
Shum Ba'huur
Page init.php

Cette page regroupe les fichiers qui permettent d'initialiser toutes les pages

*/

session_start();

include 'config.php' ;
include 'fonctions.php' ;

include 'session.php';
include 'connexionauto.php';


if(get_magic_quotes_gpc()) // Si les magic quotes sont activés, on les désactive avec notre super fonction ! ;)
{
   $_GET = stripslashes_r($_GET);
   $_POST = stripslashes_r($_POST);
   $_COOKIE = stripslashes_r($_COOKIE);
}
