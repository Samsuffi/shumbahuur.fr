<?php
/*
Shum Ba'huur
Page modifier_news.php

Permet de modifier la news

*/


$msg_resume = '';

if(isset($_POST['lbl_titre']) and $_POST['lbl_titre'] != '' and isset($_POST['area_contenu']) and $_POST['area_contenu'] != ''){

	// Définitions de variables
	$new_titre = $_POST['lbl_titre'];
	$new_contenu = $_POST['area_contenu'];
	$id = $_POST['hid_id'];
	
	
	
	//$bdd=connexionbdd();
	
	$donnees_bdd = $bdd->prepare('SELECT * FROM site_news WHERE id=:id');
	$donnees_bdd->execute(array('id' => $id));
	
	$news_bdd = $donnees_bdd->fetch();
	
	if($new_titre != $news_bdd['titre']){
		$change_titre = $bdd->prepare('UPDATE site_news SET titre=:titre WHERE id=:id');
		$change_titre->execute(array('titre' => $new_titre, 'id' => $id));
		$msg_resume = 'Le titre de la news à été modifié';
	}
	if($new_contenu != $news_bdd['contenu']){
		$change_titre = $bdd->prepare('UPDATE site_news SET contenu=:contenu WHERE id=:id');
		$change_titre->execute(array('contenu' => $new_contenu, 'id' => $id));
		$msg_resume = 'Le contenu de la news a été modifié';
	}
	
	if($msg_resume == '')
		$msg_resume = 'Aucune modification n\'a été effectuée<br />';

} 


	// Variables
	$ok = 0; // permet de savoir si la news peut être modifié

	if(isset($_GET['modifie']) and $_GET['modifie'] != ''){
		// On force à ce que l'id soit un entier
		$id_news_a_modifier = (int) $_GET['modifie'];

		// Si l'id n'est pas un entier >= 1, c'est que le GET a été modifié
		if($id_news_a_modifier == 0){
			echo 'Erreur : la news n\'est pas reconnu';
			$ok = 0;
		}
		// Si l'id est valide, on va vérifier que la news correspondante existe bien en bdd
		else{ 
			$bdd=connexionbdd();
	
			$verifie_si_news_existe = $bdd->prepare('SELECT id FROM site_news WHERE id=:id');
			$ok = $verifie_si_news_existe->execute(array('id' => $id_news_a_modifier));
	
		}
	}

	if($ok != 0){
		$news_a_modifier = $bdd->prepare('SELECT * FROM site_news WHERE id=:id');
		$news_a_modifier->execute(array('id' => $id_news_a_modifier));
		$news = $news_a_modifier->fetch();
	}
	else{
		$news = array('titre' => '', 'contenu' => '', 'x' => '', 'y' => '', 'z' => '', 'note' => '', 'id' => '');
	}

?>
	<section id='corps'>
	
		<h4><a href="<?= HOME ?>gestion_news">Gestion des news</a></h4>
		<center><h4><a href="<?= HOME ?>rediger_news">Rédiger une nouvelle news</a></h4>
		<center><h4><a href="<?= HOME ?>modifier_news">Modifier une news</a></h4>

		
		<p><?php echo $msg_resume; ?></p>
	
		<form method='post'>
			<label for='lbl_titre'>Titre : </label><br />
				<input type='text' name='lbl_titre' id='lbl_titre' value="<?php echo strip_tags(trim($news['titre'])) ; ?>" size="50" /><br />
			<label for='lbl_contenu'>Contenu : </label><br />
				<textarea type='text' name='area_contenu' id='area_contenu' rows="10" cols="45"><?php echo trim($news['contenu']) ; ?></textarea>
				<br />
			<input type='hidden' name='hid_id' value="<?php echo strip_tags($news['id']) ; ?>" />
			<input type='submit' value='Envoyer' />
		</form>
	</section>

