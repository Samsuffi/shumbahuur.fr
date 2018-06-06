<?php
/*
Shum Ba'huur

*/
?>

<div id="annonceur">
	
	<h2>Générateur d'annonces</h2>
	
	<aside>
		<?php include('regles.php'); ?>
	</aside>
	
	<div id="game">
		<hr>
		<p id="msg_alerte">Pour accéder à toutes les fonctionnalités de ce site, vous devez activer JavaScript.<br>
			Voici les <a href="http://www.enable-javascript.com/fr/" target="_blank">
			instructions pour activer JavaScript dans votre navigateur Web</a>.
		</p>

		<canvas id="canvas_tapis" width="500" height="500">
			Message pour les navigateurs ne supportant pas encore canvas.
		</canvas>
		<p id="affiche">Cliquez sur "Jouer" pour commencer</p>
		<p><input type='text' id='edit_resultat'></p>

		<div>
			
			<button id="btn_jouer">Jouer</button>
			<!--
			<button id="btn_play1">Joueur 1</button>
			<button id="btn_play2">Joueur 2</button>
			<button id="btn_play3">Joueur 3</button>
			<button id="btn_play4">Joueur 4</button>
			-->
			<button id="btn_lance">Lancer</button>
			<button id="btn_annonce">Annoncer</button>
			
		</div>
	</div>
</div>
<script src="../annonceur_roulette/annonceur_roulette.js"></script>
<script src="../annonceur_roulette/showhide.js"></script>
