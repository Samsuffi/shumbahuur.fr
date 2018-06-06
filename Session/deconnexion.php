<?php
/*
Shum Ba'huur
Page deconnexion.php

Permet de déconnecter un utilisateur, en supprimant tout ce qui à trait à la session...

*/

// Pas besoin de charger tous les élements de la page (haut, bas, etc), mais il faut quand même débuter la session.
//session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies (on va déjà essayer d'en créer...)

setcookie('lg_nom','', time()-3600, '/', null, false, true);
setcookie('lg_mdp', '', time()-3600, '/', null, false, true);
setcookie('lg_auto', '', time()-3600, '/', null, false, true);

header('Location: ../index.php');

