<?php
/* Shum Ba'huur 05/2018*/

//if(!$_SERVER['REMOTE_ADDR'] === "2.7.187.74"){
	//compteur de visite simple
	$f = fopen('visiteurs.txt', 'r+');
	 
	$visites = fgets($f); // On lit la première ligne (nombre de pages vues)
	$visites += 1; // On augmente de 1 ce nombre de pages vues
	fseek($f, 0); // On remet le curseur au début du fichier
	fputs($f, $visites); // On écrit le nouveau nombre de pages vues
	 
	fclose($f);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Le 22 Mai 2018, SOYONS SOLIDAIRES pour protéger nos familles, les écoles, la Poste, la Perception et leurs personnels. Ainsi, nul ne sera contraint de rejoindre la préfecture pour s’exprimer.">
	<title>Collectif Villages Solidaire - Grève Nationale 22 Mai 2018</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h3>MARDI 22 MAI 2018</h3>
		<h2>GRÈVE NATIONALE</h2>
		<h1>VILLAGES SOLIDAIRES</h1>
		<h4 class="italique">Et si tous les villages affichaient leur droit de grève ?</h4>
	</header>

	<main>
<p>En France, <strong class="gras"><em class="souligne">LE DROIT DE GREVE A VALEUR CONSTITUTIONNELLE ET S’OUVRE A TOUS</em>, syndiqués ou non.</strong> Trois
conditions sont indispensables : cesser le travail, avoir une volonté commune et avoir des revendications
professionnelles (amélioration des conditions de travail ; augmentation du salaire et de la retraite ; couverture sociale ;
non aux politiques d’austérité ; non à l’augmentation de la CSG, etc).</p>

<p>Commerçant ou agriculteur, travailleur indépendant ou demandeur d’emploi, salarié du secteur privé ou public, retraité
ou en voie de l’être, <strong class="gras souligne">LE CITOYEN DE BOURGADE SE RETROUVE SOUVENT SEUL POUR REVENDIQUER</strong>.</p>

<p>Bien mieux que d’être gréviste parmi des centaines d’autres dans les grandes villes, <strong class="gras">restons au sein de nos villages et exprimons, collectivement, les difficultés rencontrées.</strong></P>

<p><strong class="gras souligne">SOYONS SOLIDAIRES</strong> pour protéger nos familles, les écoles, la Poste, la Perception et leurs personnels. Ainsi, nul ne sera contraint de rejoindre la préfecture pour s’exprimer. C’est notre présence quotidienne qui fait vivre le boulanger, les commerces, les banques et les associations. Accepter leur disparition c’est laisser mourir le village lentement.</p>

<p>Rien n’interdit <strong class="gras">d’afficher son ras-le-bol</strong> en s’associant à la prochaine <strong class="gras">grève nationale</strong> du <strong>mardi 22 mai 2018.</strong></p>

<p>Encore une ! Une qui rejoint la trop longue liste des <em class="souligne">grèves dont l’écho n’arrive pas aux oreilles de nos gouvernants</em>.</p>

<p><strong class="gras"><em class="souligne">POUR REVENDIQUER</em> : définissez un lieu, présentez la/les revendication(s) et préparez une pétition.</strong></p>

<p>Si nous sommes des <strong class="gras souligne">citoyens convaincus de l'intérêt et l'importance de cette ultime grève</strong> à travers le bourg,
notre persuasion intéressera nos collègues, voisins, ainsi que d’autres villages à travers la France qui subissent l’austérité et tentent de survivre au même désarroi. <strong class="gras">Protégeons-nous les uns les autres !</strong></p>

<p>La loi précise qu’<strong class="gras">à partir d’une heure de grève</strong> le travailleur verra son <strong class="gras">salaire diminué. Néanmoins,</strong> qu’en est-il pour une période de <strong class="gras">GREVE INFERIEURE A 59 MINUTES ?</strong> <em class="souligne">La loi ne prévoit rien</em>.</p>

<div class="hr">✂<hr></div>
<div id="bandeau">
<p>JOURNÉE du 22 MAI</p>
<p class="italique">Je suis solidaire de la grève</p>
</div>
<div class="hr">✂<hr></div>

<p>Durant toute la journée du mardi 22 mai, vous êtes invité(e)s à porter le brassard ci-dessus ou bien une étiquette. Pour <em class="souligne">assurer le service public sans gêner le public</em>, il faut préparer une <strong class="gras">grève en cascade,</strong> c’est-à-dire « à tour de rôle ». Il suffit de préciser sur l’étiquette le créneau horaire durant lequel chacun exprimera son droit de grève, inférieur à 59 mn sans pour autant subir une ponction sur salaire, une telle retenue n’étant pas prévue par la loi.</p>
<p><strong class="gras">Toutes ces « voix » cumulées valideront notre action solidaire auprès des médias.</strong></p>
</main>
<footer>
	<p><a href="http://collectif-villages-solidaires.fr">http://collectif-villages-solidaires.fr</a></p>
	<p>#OnDéborde #Mai2018</p>
	<p>Merci de faire circuler ce message</p>
	<p>RESTONS LIBRES DANS LES VILLES À TAILLE HUMAINE<br><a href="mailto:collectif.villages.solidaires@outlook.fr">collectif.villages.solidaires@outlook.fr</a></p>
	<p>Ne pas jeter sur la voie publique</p>
	<?php echo '<p>Nombre de visites : ' . $visites . ' </p>'; ?>
</footer>
</body>
</html>