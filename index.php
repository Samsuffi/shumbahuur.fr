<?php
/*
Shum Ba'huur

fichier index du site => controleur => page
*/

include "init.php";

$bdd = connexionbdd();

include "controler.php";

include "template.php";

/*
error_reporting(E_ALL);

//phpinfo();
include "init.php";
$bdd = connexionbdd();
include "controler.php";

include "template.php";
/**/