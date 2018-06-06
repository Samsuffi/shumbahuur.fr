<?php
/*
Shum Ba'huur
Page session.php

C'est sur cette page que l'on gère la session d'un membre
*/

if(!isset($_SESSION['pseudo'])){
	if(isset($_COOKIE['lg_nom']) and isset($_COOKIE['lg_mdp'])){
	
		$bdd = connexionbdd();
		//$bdd =  new PDO('mysql:host=localhost;dbname=shumbahuur','root','');

		
		/* 
		Le pseudo et le pass doivent être protégés avant leur création
		Toutefois, il faudra protéger à l'affichage
		Quoi que... une re-protection avant de les utiliser en bdd ne sera peut-être pas de trop...
		*/

		$pseudo = $_COOKIE['lg_nom'];
		$mot_de_passe = $_COOKIE['lg_mdp'];
	
		$requete = $bdd->prepare('SELECT * FROM site_membres WHERE pseudo= :pseudo AND password= :pass');
		$requete->execute(array('pseudo' => $pseudo, 'pass' => $mot_de_passe));
		$resultat = $requete->fetch();
	
		if(!$resultat){
			$text = 'Mauvais identifiant ou mot de passe';
		} else {
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['pseudo'] = $resultat['pseudo'];
			$_SESSION['droits'] = $resultat['groupe'];
			
			
		}
	}
}


