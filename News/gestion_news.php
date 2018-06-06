<?php
/*
Shum Ba'huur
Page gestion_news.php

Page de gestion des news

*/

$reponse = $bdd->query("SELECT *, DATE_FORMAT(timestamp, '%d/%m/%Y à %Hh%i') as datetime FROM site_news ORDER BY id DESC");
?>
<section id='corps'>
	<h4><a href="<?= HOME ?>gestion_news">Gestion des news</a></h4>
	
	<p><a href="<?= HOME ?>rediger_news">Rédiger une nouvelle news</a></p>
	<table>
	<?php
		while($donnees = $reponse->fetch()){ ?>
				<tr><td class='news<?= $donnees['id']%2 ; ?>'>
					<h6 class='date_news'>le <?= $donnees['datetime']; ?> : </h6>
					<?php echo '<h5 class=\'titre_news\'>'.htmlentities($donnees['titre']) .'</h5>';
		
					// On protège PUIS on crée les entrées en HTML (<br />)
					$contenu = nl2br(htmlentities($donnees['contenu']));
					echo "<p>$contenu</p>";
					?>
				</td>
				<?php 
					echo '<td class=\'petit\'><a href='. HOME .'modifier_news?modifie='.$donnees['id'].'>Modifier</a></td>';
					// Pour le moment, on ne supprime pas les news (ou directement dans la bdd)
					//echo '<td class=\'petit\'><a href=suppr_news.php?supprime='.$donnees['id'].'>Supprimer</a></td>';
				?>
				</tr>
		<?php 
		}
		$reponse->closeCursor();
	?>
	</table>
</section>


