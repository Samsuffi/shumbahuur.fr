<?php
/*
Shum Ba'huur
Page news_aff.php

La page news.php est un module qui s'affiche sur la page d'accueil.
Elle devra ausi être utilisée dans la page qui servira de gestion des news...

*/

//$bdd = connexionbdd();

$query = "SELECT id, titre, contenu,
					DATE_FORMAT(timestamp, '%d/%m/%Y à %Hh%i') as datetime 
					FROM site_news 
					ORDER BY id DESC LIMIT 0,5";


if($requete = $bdd->query($query)){
	$datas = $requete->fetchAll(PDO::FETCH_ASSOC);
	$requete->closeCursor();

	//var_dump($datas);
}
?>
<section id="affiche_news">
	<h4>Voici les dernières news :</h4>
	
	<?php if(!empty($datas)){
		foreach($datas as $data){ ?>
			<article class='news<?= intval($data['id']%2); ?>'>
				<p class='date_news'>le <?= strip_tags($data['datetime']); ?> : </p>
				<h5><?= strip_tags($data['titre']); ?></h5>
				<p><?= nl2br(htmlspecialchars($data['contenu'])); ?></p>
			</article>
		<?php }
	} else { ?>
	<p>Aucune news à afficher</p>
	<?php } ?>
	
	<?php if(gestionDroits(GEST)){ ?>
		<p><a href="<?= HOME ?>gestion_news">Gestion des news</a></p>
	 <?php } ?>	
</section>
