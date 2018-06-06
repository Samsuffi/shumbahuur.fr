<?php
/*
Shum Ba'huur
Page menu.php

Le menu général du site

*/ 
?>
<?php if($contenu == "accueil.php"): ?>
<ul>
	<li><a href='<?= HOME . "donjon" ?>'>Dungeon Raider</a></li>
	<li><a href='<?= HOME . "biscotte" ?>'>Annonceur roulette</a></li>
	<li><a href="<?= HOME ?>CF" target="_blank">Christine</a></li>
	<li><a href="<?= HOME ?>liens_utiles">Liens Utiles</a></li>
</ul>
<?php else: ?>
<a href="../index.php"> < Retour à l'accueil</a>
<?php endif; ?>