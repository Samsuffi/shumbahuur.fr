<?php
/*
Shum Ba'huur
Page fonctions.php

Ce fichier regroupe les fonctions nécessaires pour tout le site

Chaque fonction fait l'objet d'un fichier propre, placé dans le dossier [version]/Admin/fonctions
Les fonctions spécifiques à une partie seront appellée au cas par cas

Note : dans un premier temps, toutes les fonctions seront regroupées ici ;
on verra plus tard les histoires de charge de serveur (ça reste un site perso, avec pas énormément de fonctions !)

Liste des fonctions :
------------------------------
testPDO()
connexionbdd()
stripslashes_r()
------------------------------
*/

/*include 'Fonctions/testPDO.php';
include 'Fonctions/connexionbdd.php';
include 'Fonctions/stripslashes_r.php';
*/

// Initialisation du compteur de fichiers
$nb_fichier = 0;
//*
if($dossier = opendir('./Fonctions')){
	while(false !== ($fichier = readdir($dossier))){
		if($fichier != '.' && $fichier != '..' && $fichier != 'index.php'){
			$nb_fichier++; // On incrémente le compteur de 1
			include 'Fonctions/'.$fichier; // on inclut le fichier
		} // On ferme le if (qui permet de ne pas afficher index.php, etc.)
	} // On termine la boucle

	//echo '<p>Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier Fonctions</p>';	

	closedir($dossier);
}
else echo 'Le dossier n\' a pas pu être ouvert';
//*/