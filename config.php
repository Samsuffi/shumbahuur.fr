<?php
/* 
Shum Ba'huur
Page config.php

Ce fichier permet de définir les accès suivant l'adresse de connexion.

On définira aussi ici les raccourcis des chemins des dossiers
*/

$DEBUT = microtime(true);

// ??? permet d'afficher toutes les erreurs ???
error_reporting(E_ALL);

// Définition du chemin d'accès au serveur
if($_SERVER['HTTP_HOST'] == 'localhost'){
	define('ROOTPATH', 'http://localhost/Site');
	define('TITRESITE', 'Shumbahuur - Local');
	define('HOME','/Site/index.php/');
}
/* Inactif pour l'instant 
else if($_SERVER['HTTP_HOST'] == 'www.shumbahuur.fr'){
	define('ROOTPATH', 'http://www.shumbahuur.fr');
	define('TITRESITE', 'Shumbahuur.fr');
}
*/
else if($_SERVER['HTTP_HOST'] == 'xb627rn321.freeheberg.org'){
	define('ROOTPATH', 'http://xb627rn321.freeheberg.org');
	define('TITRESITE', 'Shumbahuur.fr');
	define('HOME','/index.php/');
}



// Url courte de l'accueil
//define('HOME','/Site/index.php/');

// Déboguage
define('DEBUG', true);
//define('DEBUG', false);

// Définition des noms et codes des droits d'accès
/*
0 : visiteur (aucun droit)
1 : Admin
2 : Gestionnaire
4 : Modérateurs
8 : DP
16 : CA
32 : 
64 : 
ADMIN ?
*/

define('ADMIN', 'ADMIN');
define('GEST', 'GEST');
define('MOD', 'MOD');
define('CA','CA');
define('DP','DP');

define('VISITEUR',0);
