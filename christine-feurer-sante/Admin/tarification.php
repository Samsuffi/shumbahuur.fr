<?php	/*

Shum Ba'huur

*/

require("../connexionbdd.php");

try{
	$bdd = connexionbdd();
} catch (PDOException $e){
	die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT * FROM CF_tarifs";

$req = $bdd->query($sql);
$tarifs = $req->fetchAll(PDO::FETCH_ASSOC);	

// Si le POST n'est pas vide, c'est qu'on tente de sauvegarder
if(!empty($_POST)){
	//var_dump($_POST);
	
	// on prépare la requête
	$req = $bdd->prepare("UPDATE tarifs 
									SET prix = :prix
									WHERE id = :id");
	
	for($i = 0, $j = 1; $i < count($tarifs) ; $i++, $j++){
		
		//Si la valeur n'est pas numérique, on passe à la suit sans modification
		if(intval($_POST['soin_' . $j], 10) == 0){
			continue;
		}
		
		// Si le tarif est différent, c'est qu'on a fait une mise à jour
		if($tarifs[($i)]['prix'] != $_POST['soin_' . $j]){
			echo $j . " => ". $tarifs[($i)]['prix'] ." - ". $_POST['soin_' . $j] ."<br>";
			
			$req->bindParam(':prix', $_POST['soin_' . $j], PDO::PARAM_INT);
			$req->bindParam(':id', $j, PDO::PARAM_INT);
			$req->execute();
		}
	}
session_destroy();
header('Location: ../index.php?#tarifs');exit;
}

// Récupération du contenu de la bdd pour l'afficher (après traitement le cas échéant)
$sql = "SELECT * FROM CF_tarifs";

$req = $bdd->query($sql);
$tarifs = $req->fetchAll(PDO::FETCH_ASSOC);	

?>
<DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="#" method="POST">
		<table>
			<?php foreach ($tarifs as $t){ ?>
			<tr>
				<td><?= $t['nom_soin'] ?></td>
				<td><input name="soin_<?= $t['id'] ?>" value="<?= $t['prix'] ?>"></td>
				<td> € </td>
				<!--<td><a href="#?action=modifier">Modifier</a></td>-->
			</tr>
			<?php } ?>
			
		</table>
		<button type="reset">Annuler les changements</button>
		<button type="submit">Sauvegarder</button>
		
	</form>
</body>
</html>