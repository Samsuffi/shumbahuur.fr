<?php /*

Shum Ba'huur

*/
require("connexionbdd.php");

try{
	$bdd = connexionbdd();
} catch (PDOException $e){
	die('Erreur : ' . $e->getMessage());
}
	
$sql = "SELECT * FROM CF_tarifs";

$req = $bdd->query($sql);
$tarifs = $req->fetchAll(PDO::FETCH_ASSOC);


?><DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
		<link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <title>Christine Feurer</title>
</head>
<body>
<header>

	<nav>
			<ul>
					<li><a href="#who">Qui suis-je ?</a></li>
					<li><a href="#outils">Les soins</a></li>
					<li><a href="#tarifs">Tarifs</a></li>
			</ul>
	</nav>

</header>
<main>
	<section id="contact">
			<h1><a href="index.php">Christine Feurer</a></h1>

			<ul>
					<li><strong>Ostéopathe</strong></li>
					<li><strong>Kinésiologue</strong></li>
					<li><strong>Masseuse</strong></li>
			</ul>

			<ul>
					<li><a href="tel:+33670995186">06 70 99 51 86</a></li>
					<li>
							<strong>Vercors : </strong>
							<span>déplacement à domicile</span>
					</li>
					<li>
							<strong>Grenoble : </strong>
							<span><a href="#map">39 av. Jean Perrot</a></span>
					</li>
					<li><a href="mailto:christine.feurer@free.fr">christine.feurer@free.fr</a></li>
			</ul>
	</section>
	<section id="presentation">
			<p>Vous êtes fatigué, <br>stressé, <br>vous avez des douleurs récurrentes, <br>votre médecin et les spécialistes disent que "tout va bien" ?</p>
			<p>Vous rencontrez des difficultés scolaires ou d'apprentissage ?<br> Vous préparez un examen, un coucours, une compétition,<br> une reconversion professionnelle ?</p>
			<p>Vous n'arrivez plus à communiquer avec vos enfants, <br>vos parents, <br>votre conjoint(e), <br>vos collègues ?</p>
			<div>
					<h2>Christine Feurer</h2>
					<p>... pour que la vie vous sourie... </p>
					<ul>
							<li>Ostéopathe</li>
							<li>Kinésiologue</li>
							<li>Masseuse</li>
					</ul>
			</div>
	</section>
	<section id="who">
			<h2>Qui suis-je ?</h2>
			<p>Masseuse et très empathique depuis l'enfance, je suis devenue kinésithérapeute en 1997.</p>
			<p>Toujours en recherche de méthodes douces, bienveillantes et efficaces je me suis alors formée en <span title="Méthode thérapeutique manuelle utilisant des techniques de manipulations vertébrales ou musculaires">Ostéopathie</span> et <span title="Méthode de soin qui associe le mouvement, le tonus musculaire et diverses maladies.">Kinésiologie</span> (2002), en <span title="Le massage thaïlandais permet de stimuler la circulation sanguine et la flexibilité">Nuad Bo Rarn</span> (2004) tout en explorant les possibilités de l'énergétique chinoise et l'accompagnement par les Elixirs Floraux (Bach, Deva,  Sylfos) et d'Animaux Sauvages (Wild Earth Essences du Dr Mapel).</p>
			<p>Ma pratique de la Danse Libre Malkovsky, du yoga, de la Méditation Transcendentale, du Taï Chi (et d'un certain nombre de sports) m'ont ouvert l'esprit à une approche globale, complète et respectueuse de l'Être Humain.</p>
			<p>C'est cette recherche de l'harmonie, de l'équilibre entre toutes nos composantes et de l'épanouissement de notre unicité en relation avec le monde et les autres, qui motive mon travail de thérapeute.</p>
	</section>

	<section id="outils">
			<h2>Les soins</h2>
			<article>
					<img src="img/osteo_senior.jpg" alt="Ostéopathe traitant patient féminin avec problème d'encolure" title="Ostéopathe traitant patient féminin avec problème d'encolure" width="612" height="408">
					<h3>Ostéopathie</h3>
					<p>Plus le corps fonctionne de manière harmonieuse, meilleures sont ses chances de survie, de guérison, de maintien et d'adaptation. Tel est l'objectif de l'Ostéopathie qui s'occupe de "diagnostiquer et de traiter les système déséquilibrés du corps humain" (Dr A. STILL)</p>
			</article>
			<article>
					<img src="img/kinesio2.jpeg" alt="une main en contact avec un poignet" title="une main en contact avec un poignet" width="612" height="408">
					<h3>Kinésiologie</h3>
					<p>Grâce à une découverte du Dr Goodhearth montrant que l'état interne du corps se reflète dans l'état fonctionnel des muscles, puis l'observation que notre corps garde en mémoire tous les stimuli ressentis, nous pouvons interroger le corps sur ses besoins et les mesures appropriées au rétablissement de l'équilibre en utilisant des tests musculaires manuels.</p>
			</article>
			<article>
					<img src="img/massage_thai.jpg" alt="une praticienne et une patiente durant une séance de massage thaïlandais" title="une praticienne et une patiente durant une séance de massage thaïlandais" width="489" height="350">
					<h3>Nuad Bo Rarn ou massage Traditionnel Thaïlandais</h3>
					<p>Se pratique habillé, au sol. Basé sur des principes énergétiques, il suit un protocole considérant le corps tout entier et permet d'équilibrer toutes les énergies pour ré-accorder corps et esprit dans le respect de chacun.</p>
			</article>
	</section>

	<section id="tarifs">
			<h2>Tarifs <small>le/au/màj/m.à.j/m-à-j <a href="Admin/tarification.php">:</a> <?= "12/2111" ?></small></h2>
			<div>
					<article>
							<h3>Ostéopathie - Kinésiologie</h3>
							<ul>
									<li>Adultes : <?= $tarifs[0]['prix'] ?>€</li>
									<li>Enfants - Adolescents : <?= $tarifs[1]['prix'] ?>€</li>
									<li>Nourrissons : <?= $tarifs[2]['prix'] ?>€</li>
							</ul>
					</article>
					<article>
							<h3>Massage détente et relaxant</h3>
							<ul>
									<li>30min : <?= $tarifs[3]['prix'] ?>€</li>
									<li>60min : <?= $tarifs[4]['prix'] ?>€</li>
									<li>90min : <?= $tarifs[5]['prix'] ?>€</li>
							</ul>
					</article>
					<article>
							<h3>Massages thérapeutiques</h3>
							<ul>
									<li>Nuad Bon Rarn : <?= $tarifs[6]['prix'] ?>€</li>
									<li>Réflexologie Plantaire : <?= $tarifs[7]['prix'] ?>€</li>
							</ul>
					</article>
			</div>
			
	</section>
	<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7954.53554305428!2d5.7284108330193755!3d45.17994984617534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af4e952e8add1%3A0xda11e76f46ed90e4!2s39+Avenue+Jean+Perrot%2C+38100+Grenoble!5e0!3m2!1sfr!2sfr!4v1506955260714" width="100%" height="450" style="border:0" allowfullscreen></iframe>
</main>
<footer>

</footer>
</body>