<?php
/*
Shum Ba'huur
Page banniere.php

La bannière du site
Si on est en local, un lien permet de retourner à l'index local

*/

if(isset($_SESSION['pseudo']) and $_SESSION['pseudo'] != NULL and $_SESSION['pseudo'] != ''){
	
	$pseudo = "<a href='". HOME . "espace_membre'>";
	$pseudo .= htmlspecialchars($_SESSION['pseudo']);
	$pseudo .= "</a>";
	
} else {
	$pseudo = 'visiteur';
}


/****************** HTML *************************/ ?>
<h1><a href="http://xb627rn321.freeheberg.org">Shumbahuur.fr</a></h1>
<?php if($_SERVER['HTTP_HOST'] == 'localhost' ): ?>
<p><a href="<?= HOME ?>">Local</a> -
<a href="http://www.shumbahuur.fr">w.Shum.fr</a></p>
<?php endif; ?>	

<p>Bienvenue <?= $pseudo ;?>
	<?php if(!isset($_SESSION['id'])){ ?>
		<a href="<?= HOME ?>connexion"> - Se connecter <i class="fas fa-unlock"></i></a>
	<?php } else { ?>
		<a href="<?= HOME ?>deconnexion"> - Déconnexion <i class="fas fa-lock"></i></a>
	<?php } ?></p>
