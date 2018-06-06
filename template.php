<?php
if(!isset($contenu)) $contenu = "accueil.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<!-- meta -->
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Shum Ba'huur">

	<title><?php echo TITRESITE ?></title>
	
	<!-- Chargement des polices -->
	<link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded%7CKumar+One+Outline%7CUnlock%7CTinos" rel="stylesheet">
	<!-- Chargement des icones -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	
	<!-- mon icon -->
	<link rel="icon" href="<?= ROOTPATH ?>/Images/jeton3.png" type="image/png">
	<!-- Normalize -->
	<link rel="stylesheet" href="<?= ROOTPATH ?>/css/normalize.css" media="screen" type="text/css" title="Défaut">
	<!-- Stylesheet -->
	<link rel="stylesheet" href="<?= ROOTPATH ?>/css/style.css" media="screen" type="text/css" title="Défaut">
</head>

<?php if(DEBUG === true){
	echo "<small>";
	include 'debug_infos.php';
	echo "</small>";
} ?>
<body>
	<header>
		<?php include 'banniere.php'; ?>
	</header>
	<nav>
		<?php include 'menu.php'; ?>		
	</nav>
	<main>
	<?php include $contenu; ?>
	</main>
	<footer>
		<?php include "footer.php"; ?>
	</footer>
</body>
<!-- Et ici s'affiche la Bannière de l'hébergeur -->
</html>