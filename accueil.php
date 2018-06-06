<?php
/*
Shum Ba'huur
Page accueil.php

Page d'accueil du site
*/
?>

<hr>
	
<section>
	<h2>Mes projets</h2>
	
	<article>
		
		<h3><a href='<?= HOME . "annonceur_roulette" ?>'>Générateur d'annonces</a></h3>
		<img src="<?= ROOTPATH ?>/Images/annonceur.png" alt="" width="499" height="501">
		<p>Quand un croupier se prend l'envie de programmer un truc pour s'entrainer à compter, ça donne le Générateur d'annonces Roulette</p>
		<p>Le métier de croupier nécessite de calculer vite et bien</p>
		<p>Avec cet outil, vous êtes le croupier, et vous devez annoncer le nombre de jetons à payer au joueur</p>
		<p>Note : si vous n'êtes pas croupier, ce "jeu" ne vous provequera pas un grand intérêt... Par contre, en after entre collègues croupiers, y'a matière à se challenger.</p>
	</article>
	
	<article>
		<h3><a href="<?= HOME ?>CF" target="_blank">Christine Feurer</a></h3>
		<img src="<?= ROOTPATH ?>/Images/CF.png" alt="" width="715" height="721">
		<p>Christine Feurer est une professionnelle de la santé qui songeait à se faire connaitre sur le web.</p>
		<p>Je lui ai proposé de lui développer un site.<br/>
		
		<p>Merci à Clochette pour ses critiques artistiques qui rendent le site plus agréable visuellement. </p>
		
	</article>
	
</section>
	
<hr>
<aside>
	<?php include 'News/affichage.php'; ?>
</aside>

