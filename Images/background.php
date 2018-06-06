<?php 
/* 
Shum Ba'huur

background.php
générateur de fond aléatoire
*/
// On va renvoyer une image PNG
header("Content-type: image/png");

// On crée une image de 100x100
$image = imagecreate(500,500);

// On dessine
//imagestring($image, 4, 50, 50, "Shum Ba'huur", "red");
//imageRectangle($image, 30,30,126,327, "red");



// On affiche l'image
imagepng($image);
// Si on veut l'enregistrer : (et on supprime le header)
//imagepng($image, "monimage.png");


<?php

// Liste des classes dans l'ordre des dépendances.
include 'Point.class.php';
include 'Shape.class.php';
include 'Rectangle.class.php';
include 'Carre.class.php';
include 'Ellipse.class.php';
include 'Circle.class.php';
include 'Polygon.class.php';
include 'SvgRenderer.class.php';
include 'Program.class.php';



/********** CODE PRINCIPAL **********/

// Création d'une instance de notre programme et du moteur SVG puis exécution.
$program  = new Program();
$renderer = new SvgRenderer();
$program->run($renderer);


// Inclusion du template.
include 'index.phtml';