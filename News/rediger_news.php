<?php
/*
Shum Ba'huur
Page rediger_news.php

Permet de rédiger une nouvelle news

*/

if(isset($_POST['lbl_titre']) and $_POST['lbl_titre'] != '' and isset($_POST['area_contenu']) and $_POST['area_contenu'] != ''){
	$titre = strip_tags($_POST['lbl_titre']);
	$contenu = htmlspecialchars($_POST['area_contenu']);
		
	$insert_news = $bdd->prepare("INSERT INTO site_news (titre, contenu) VALUES(:titre,:contenu)");
	$insert_news->execute(array('titre' => $titre, 'contenu' => $contenu));
	
	header('Location: '. HOME .'gestion_news');
}
?>

<section id='corps'>
	<center><h4><a href="<?= HOME ?>gestion_news">Gestion des news</a></h4>
	<center><h4><a href="<?= HOME ?>rediger_news">Rédiger une nouvelle news</a></h4>
	
	<form method='post'>
		<label for='lbl_titre'>Titre : </label><br />
			<input type='text' name='lbl_titre' id='lbl_titre' value="" size="50" /><br />
		<label for='area_contenu'>Contenu : </label><br />
			<textarea type='text' name='area_contenu' id='area_contenu' rows="10" cols="45"></textarea>
			<br />
		<input type='hidden' name='hid_id' value="<?php //echo strip_tags($news['id']) ; ?>" />
		<input type='submit' value='Envoyer' />
	</form>
</section>

