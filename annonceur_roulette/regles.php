<?php
	// à inclure dans un aside => done !
	
	// id sur div ? pour display: none
	// js à part
?>
<section>
	<h3 title="Cliquez pour cacher">Règles <i class="far fa-eye-slash" aria-hidden="true"></i></h3>
	<div id="rules">
		<p>Le métier de croupier implique de savoir compter vite et bien.<br>
			Ici, je vous propose d'endosser le rôle de croupier à une table de Roulette <small>(Américaine, mais cela n'a pas d'importance)</small>, main gauche <small>(ce qui signifie que le croupier lance la bille avec sa main gauche)</small>.		
		</p>
		<p>
			Mettons de côté le lancer de bille pour se concentrer sur le paiement.<br>
			Ici, un seul joueur est présent. Il possède de jetons de couleur <a class="klein" href="https://fr.wikipedia.org/wiki/International_Klein_Blue">bleu Klein</a> qu'il va placer sur le tapis.<br>
			Par superstition, il décide de ne jouer que diverses combinaisons de mises sur un seul numéro.<br>
			Et, manque de bol, la bille tombe systématiquement sur le numéro choisi par le joueur.
		</p>
		<p>En tant que croupier, votre but va être de calculer -le plus rapidement possible- le nombre de pièces que vous devez payer au client.
		</p>
		<article>
			<h3>Les combinaisons de mises</h3>
			<table>
				<thead>
				<tr>
					<th>Nom</th>
					<th>Nbr de pièces</th>
					<th>Position sur le tapis</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td>un plein</td>
						<td>35</td>
						<td>le jeton au centre de la case, joue seulement un seul numéro, rapporte 35 fois la mise</td>
					</tr>
					<tr>
						<td>un cheval</td>
						<td>17</td>
						<td>à cheval sur la ligne entre deux cases, joue deux numéros, rapporte 17 fois la mise</td>
					</tr>
					<tr>
						<td>un carré</td>
						<td>8</td>
						<td>à l'intersection de 4 cases, joue 4 numéros, rapporte 8 fois la mise</td>
					</tr>
					<tr>
						<td>une transversale</td>
						<td>11</td>
						<td>sur la ligne au bord supérieur du tapis, joue les 3 numéros perpendiculaires à la ligne, rapporte 11 fois la mise</td>
					</tr>
					<tr>
						<td>un sixain</td>
						<td>5</td>
						<td>sur l'intersection supérieure du tapis, joue les 6 numéros des deux lignes perpendiculaires à la ligne, rapporte 5 fois la mise</td>
					</tr>
				</tbody>
			</table>
		</article>
		
		<article id="exemple">
			<h3>Concrètement, il faut faire quoi ?</h3>
			<p>Compter et annoncer le nombre de jetons que le joueur a gagné !</p>
			<div>
				<div>
					<img alt="exemple du jeu" title="exemple du jeu" src="<?= ROOTPATH ?>/Images/156.png" width="400" height="400">
				</div>
				<div>
					<p>Dans cet exemple, nous plaçons un jeton sur chaque combinaison possible&nbsp;:</p>
					<ul>
						<li class="sixain">deux sixains (2 x 5 pièces)</li>
						<li class="trans">une transversale (11 pièces)</li>
						<li class="carre">quatre carrés (4 x 8 pièces)</li>
						<li class="cheval">quatre chevaux (4 x 17 pièces)</li>
						<li class="plein">un plein (35 pièces)</li>
					</ul>
					<p>Soit 10 + 11 + 32 + 68 +35 = 156 pièces.</p>
				</div>
			</div>
			<hr>
			<p>Il suffit de rentrer le résultat dans l'emplacement prévu à cet effet, puis de cliquer sur le bouton "Annoncer".</p>
			<p>Le niveau de difficulté varie en fonction de la rapidité de votre réponse.</p>
			<p>Vous pouvez utiliser la touche [Enter] du clavier ou du pavé numérique pour valider votre réponse plus rapidement.</p>
			<p>Chaque réponse erronée entraine une pénalité de 60 secondes à votre temps.</p>
		</article>
	</div>
</section>