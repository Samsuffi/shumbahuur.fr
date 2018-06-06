<?php
/*
Shum Ba'huur
Page connexionauto.php

Si les cookies de connexion automatiques existent, on les utilise
*/

if(isset($_COOKIE['lg_auto']) and $_COOKIE['lg_auto'] == 'oui') {
	if(isset($_COOKIE['lg_nom']) and isset($_COOKIE['lg_mdp']) and $_COOKIE['lg_nom'] != '' and $_COOKIE['lg_mdp'] != ''){
		$bdd = connexionbdd();
	
		$pseudo = $_COOKIE['lg_nom'];
		$mot_de_passe = $_COOKIE['lg_mdp'];

		$requete = $bdd->prepare('SELECT * FROM site_membres WHERE pseudo= :pseudo AND password= :pass');
		$requete->execute(array('pseudo' => $pseudo, 'pass' => $mot_de_passe));
		$resultat = $requete->fetch();

		if($resultat){
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['pseudo'] = $resultat['pseudo'];
			$_SESSION['droits'] = $resultat['groupe'];
		}
	}
}
