<?php
/*
Shum Ba'huur
Fonction connexionbdd.php

switch automatique de la bdd localhost/en ligne

return connexion à la base de données ou die(MsgError)

usage :
$bdd = connexionbdd();
$bdd->query[...]

*/

function connexionbdd(){
	// Définitions de variables de connexion à la base de données
	if(ROOTPATH == 'http://localhost/Site'){ // HORS LIGNE
		$bd_nom_serveur = 'localhost';
		$bd_login = 'root';
		$bd_mot_de_passe = '';
		$bd_nom_bd = 'shumbdd';
	}
	/*else if(ROOTPATH == 'http://www.shumbahuur.fr'){ // EN LIGNE
		$bd_nom_serveur = 'db2264.1and1.fr';
		$bd_login = 'dbo314611654';
		$bd_mot_de_passe = 'S4m5uff1t';
		$bd_nom_bd = 'db314611654';
	}*/
	else if(ROOTPATH == 'http://xb627rn321.freeheberg.org'){ // EN LIGNE
		$bd_nom_serveur = 'sql-1';
		$bd_login = 'xb627rn321';
		$bd_mot_de_passe = 'Wm3KyHvI9AM1';
		$bd_nom_bd = 'xb627rn321_shumbdd';
	} else {
		$bd_nom_serveur = '';
		$bd_login = '';
		$bd_mot_de_passe = '';
		$bd_nom_bd = '';
	}
	
	try
	{
		//return new PDO('mysql:host=localhost;dbname=shumbahuur','root','');
		//return new PDO('mysql:host=db2264.1and1.fr;dbname=db314611654','dbo314611654','S4m5uff1t');
		return new PDO('mysql:host='.$bd_nom_serveur.';dbname='.$bd_nom_bd, $bd_login, $bd_mot_de_passe);
	}
	catch (Exception $e)
	{
		exit(utf8_encode('Erreur lors de la connexion à la base de données : <br>' . $e->getMessage()));
	}
	
}

