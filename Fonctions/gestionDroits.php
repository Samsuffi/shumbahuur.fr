<?php
/*
Shum Ba'huur
Page gestionDroits.php

Fonction permettant de tester l'accès à certaines parties du site

Admin : Tout les droits
Gestionnaire : Quasiment tous les droits (peut-être nécessaire suivant les besoins...)
Modérateurs : Beaucoup de droits
Membres : (chaque groupe de membre aura des accès différents)
- Donjon
- Castel

0 : visiteur (aucun droit)
1 : ADMIN
2 : Gestionnaire
4 : Modérateur
8 : DP
16 : CA
32 : 
64 : 
128 : Membre (doit attendre une affectation)

*/

/*
TODO :

On va tester si la session existe et quel est le niveau de droit
comme on appelera cette fonction depuis un "if", il faut un reurn true or false
=> il faut tester le niveau...
*/

/*
si la session de l'utilisateur correspond à son droit d'accès, on retourne OUI
sauf que Admin gère partout...

1 : Admin uniquement
2 : gest uniquement
3 : admin + gest
4 : mod uniquement
6 : admin + mod
7 : 
8 : 
16 : 

*/

function gestionDroits($niveau){
	
	if(isset($_SESSION['droits'])){
		$session = $_SESSION['droits'];
	
		switch($niveau){
			case ADMIN : if($session == ADMIN) {return true;} else {return false;} break;
			case GEST : if($session == ADMIN or $session == GEST) {return true;} else {return false;} break;
			case DP : if($session == ADMIN or $session == GEST or $session == DP) {return true;} else {return false;} break;
			case CA : if($session == ADMIN or $session == GEST or $session == CA) {return true;} else {return false;} break;
			default : return false;
		}
	
	} else 
		return false;
}	


