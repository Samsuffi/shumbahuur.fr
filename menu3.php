<?php
// Initialisation du compteur de fichiers
$nb_fichier = 0;
echo '<ul>';

if($dossier = opendir('../Site')){
	while(false !== ($fichier = readdir($dossier))){
		if($fichier != '.' && $fichier != '..' && $fichier != 'index.php'){
			$nb_fichier++; // On incrémente le compteur de 1

			echo '<li><a href="../Site/' . $fichier . '">' . $fichier . '</a></li>';
		
		} // On ferme le if (qui permet de ne pas afficher index.php, etc.)
	} // On termine la boucle

	echo '</ul><br />';
	echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';

	closedir($dossier);
}
else echo 'Le dossier n\' a pas pu être ouvert';

