<?php
/*
Shum Ba'huur
Page connexion.php

Cette page permet à l'utilisateur de se connecter au site

*/

if(isset($_POST['pseudo']) and isset($_POST['mot_de_passe'])){
	
	$bdd = connexionbdd();
	
	$pseudo = strip_tags($_POST['pseudo']);
	$mot_de_passe = sha1(strip_tags($_POST['mot_de_passe']));
	
	/*$query = 'SELECT * 
						FROM site_membres 
						WHERE pseudo= :pseudo AND password= :pass';
	*/
	
	$query = 'SELECT *
						FROM site_membres 
						
						INNER JOIN membre_groupe
						ON membre_groupe.groupe = site_membres.groupe
						
						WHERE pseudo= :pseudo AND password= :pass';
	
	
	
	$requete = $bdd->prepare($query);
	
	$requete->execute(array('pseudo' => $pseudo, 'pass' => $mot_de_passe));
	$resultat = $requete->fetch(PDO::FETCH_ASSOC);
	$requete->closeCursor();
	
	//var_dump($resultat);
	
	if(!$resultat){
		$text = 'Mauvais identifiant ou mot de passe';
	} else {
		$_SESSION['id'] = strip_tags($resultat['id']);
		$_SESSION['pseudo'] = strip_tags($resultat['pseudo']);
		$_SESSION['droits'] = strip_tags($resultat['niveau']);
		$text = 'Connexion réussie';
		
		if(isset($_POST['connexion_auto'])){
			
			// 365*24*3600 = un an = 365j de 24h de 3600sec (1h)
			if($_SERVER['HTTP_HOST'] == 'localhost')
				$time = time()+365*24*3600;
			else if($_SERVER['HTTP_HOST'] == 'www.shumbahuur.fr')
				$time = time()+30*24*3600;
			
			setcookie('lg_nom', $pseudo, $time, '/', null, false, true);
			setcookie('lg_mdp', $mot_de_passe, $time, '/', null, false, true);
			setcookie('lg_auto', 'oui', $time, '/', null, false, true);
			
		}
		//*
		if(isset($_GET['page_source']) and $_GET['page_source'] != ''){
			switch(strip_tags($_GET['page_source'])){
				case 'accueil_dp' : $page_destination = '../DP/dp_accueil'; break;
				case 'accueil_ca' : $page_destination = '../CA/ca_accueil'; break;
				default : $page_destination = '../index';
			}
		} else {
			$page_destination = '../index';
		}//*/
		//header('Location: '.  HOME);
	}
}
?>
<div id='corps'>
	
	<?php	if(isset($text)){echo $text;}	?>
	
	<form method='post'>
		<label for='pseudo'>Pseudo</label>
		<input type='text' name='pseudo' id='pseudo' />
		<br/>
		<label for='mot_de_passe'>Mot de passe</label>
		<input type='password' name='mot_de_passe' id='mot_de_passe' />
		<br/>
		<input type='checkbox' name='connexion_auto' id='connexion_auto' <?php if(isset($_COOKIE['lg_auto'])) echo 'checked=\'checked\''; ?> />
		<label for='connexion_auto'>Connexion automatique (utilise des cookies)</label>
		<br/>
		<input type='submit' value='Connexion' />
	</form>
</div>