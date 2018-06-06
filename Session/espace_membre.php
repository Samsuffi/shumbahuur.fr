<?php
/*
Shum Ba'huur

page espace_membre.php
*/
$query = "SELECT pseudo, 
					DATE_FORMAT(inscription, '%d/%m/%Y') as inscription
					FROM site_membres WHERE id= :idsession";
$requete = $bdd->prepare($query);
$requete->execute(array('idsession' => $_SESSION['id']));
$data = $requete->fetch(PDO::FETCH_ASSOC);
$requete->closeCursor();

if(empty($_SESSION['nbr_error']))
{
	$_SESSION['nbr_error'] = 0;
}


// si on poste un formulaire
if(!empty($_POST))
{
	// si le formulaire est rempli
	if(!empty($_POST['oldmdp']) and !empty($_POST['newmdp']) and !empty($_POST['newmdp2']))
	{
		// si le couple mdp/confirmation est identique
		if($_POST['newmdp'] === $_POST['newmdp2'])
		{
			// on vérifie que le nouveau et l'ancien mot de passe ne sont pas identiques
			if($_POST['newmdp'] != $_POST['oldmdp'])
			{
				// cryptage du mot de passe
				$mdp = sha1(strip_tags($_POST['oldmdp']));
				
				
				$req_mdp = $bdd->prepare("SELECT password FROM site_membres WHERE id = :idsession AND password = :mdp");
				
				$req_mdp->execute(array('idsession' => $_SESSION['id'], 'mdp' => $mdp));
				
				$data_mdp = $req_mdp->fetch(PDO::FETCH_ASSOC);
				$req_mdp->closeCursor();
				
				// on vérifie le oldmdp en bdd
				if($mdp === $data_mdp['password'])
				{
					$newmdp = sha1(strip_tags($_POST['newmdp']));
					
					$req_new_mdp = $bdd->prepare("UPDATE site_membres SET password =:mdp WHERE id = :idsession");
					
					if($req_new_mdp->execute(array('mdp'=>$newmdp, 'idsession'=>$_SESSION['id'])))
					{
						$error_msg = "Mot de passe modifié";
					} else {
						$error_msg = "Echec de la modification du mot de passe";
					}
				} else 	{
					$error_msg = "Le mot de passe est incorrect";
					if($_SESSION['nbr_error']++ > 2)
					{
						//header("Location:deconnexion");
					}
				}
			} else {
				$error_msg = "Le nouveau mot de passe doit être différent de l'ancien";
			}
		}else{
			$error_msg = "Le nouveau mot de passe et sa confirmation doivent être identiques";
		}
	}else{
		$error_msg = "Veuillez remplir tous les champs du formulaire";
	}
}
	
	
	
	


?>
<section>
	<div>
		<p>Pseudo :</p>
		<p><?= $data['pseudo'] ?></p>
	</div>
	<div>
		<p>Inscrit depuis le : </p>
		<p><?= $data['inscription'] ?></p>
	</div>
	<form method="POST">
		<fieldset>
			<legend>Modifier le mot de passe</legend>
			
			<p>Ancien mot de passe : </p>
			<p><input type="password" name="oldmdp"></p>
			
			<p>Nouveau mot de passe : </p>
			<p><input type="password" name="newmdp"></p>
			
			<p>Confirmer le nouveau mot de passe : </p>
			<p><input type="password" name="newmdp2"></p>
			
			<p><?php if(isset($error_msg)){echo $error_msg;}	?></p>
			
			
			<input type="submit" value="Modifier le mot de passe">
		</fieldset>
	</form>
</section>