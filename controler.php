<?php
/*
Shum Ba'huur

fichier global.controler.php

plutôt que de mettre le controlleur sur l'index, on le gère dans un fichier à part (index clair)

*/

// normalement, on peut supprimer la ligne (déclaré dans config.php)
// define('HOME','/Site/index.php/');


// création de $contenu
//$contenu = "accueil.php";

/* 
Analyse de l'url

$_SERVER['QUERY_STRING'] => paramètres
*/
/*
// là on joue
echo "<p>";
echo "Uri = " . $_SERVER['REQUEST_URI'] . "<br>";
echo "Script = " . $_SERVER['SCRIPT_NAME'] . "<br>";
echo "Query = " . $_SERVER['QUERY_STRING'] . "<br>";
echo "HOME = ". HOME . "<br>";

echo "Realpath = ".realpath('controler.php')."<br>"; 

echo "</p>";
/**/

$page_demandee = "";
$params = "";


// on récupère les informations de l'adresse sans le domaine
$page_demandee = substr($_SERVER['REQUEST_URI'], strlen(HOME));

// Lien original vers l'annonceur 
//$old_link = "http://www.shumbahuur.fr/index.php?section=Autres&page=annonceur_roulette";
$old_uri = "/index.php?section=Autres&page=annonceur_roulette";
if($_SERVER['REQUEST_URI'] == $old_uri){
	$page_demandee = "annonceur_roulette";
	$_SERVER['QUERY_STRING'] = "";
}
/**/

// Si on a envoyé des paramètres
if($_SERVER['QUERY_STRING']){
	
	// la page demandée, est celle sans les paramètres
	$page_demandee = substr($page_demandee, 0, -(strlen($_SERVER['QUERY_STRING']) + 1 ));
	
	// on enregistre les paramètres (pas forcément utile)
	$params = $_SERVER['QUERY_STRING'];
}
/*/
echo "page cible = " . $page_demandee  . "<br>";
echo "paramètres = " . $params  . "<br>";
/**/

//switch($_SERVER['REQUEST_URI']){
switch($page_demandee){
	
	// Annonceur roulette
	case "biscotte" : 
		//$contenu = 'annonceur_roulette/annonceur_roulette.php'; break;
	case "annonceur_roulette" : 
		$contenu = 'annonceur_roulette/annonceur_roulette.php'; break;
	
	//Switch de session
	case "connexion" :
		$contenu = 'Session/connexion.php'; break;
	case "deconnexion" :
		$contenu = 'Session/deconnexion.php'; break;
		
	// Espace membre
	case "espace_membre" :
		$contenu = 'Session/espace_membre.php'; break;
	
	// Christine
	case "CF" :
		header("Location:../christine-feurer-sante/index.php"); break;
		
	// Liens utiles
	case "liens_utiles":
		$contenu = 'liens_utiles.php'; break;
	
	// Gestion des news
	case "gestion_news":
		$contenu = 'News/gestion_news.php'; break;
	case "rediger_news":
		$contenu = 'News/rediger_news.php'; break;
	case "modifier_news":
		$contenu = 'News/modifier_news.php'; break;
	
	// Dungeon Rider
	case "donjon":
		$contenu = 'dungeon_raider/dungeon_raider.php'; break;
	
	
	// Retour à l'accueil par défaut
	default :
		$contenu = "accueil.php";
}
/* switch($_SERVER['REQUEST_URI']){
	case $url : 
		$contenu = "accueil.php"; break;
	case $url . "biscotte" : 
		$contenu = 'annonceur_roulette/annonceur_roulette.php'; break;
	case $url . "connexion" :
		$contenu = 'Session/connexion.php'; break;
	case $url . "deconnexion" :
		$contenu = 'Session/deconnexion.php'; break;
		
	default :
		$contenu = "accueil.php";
}
 */


//echo "<hr>";