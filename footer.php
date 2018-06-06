<?php /* 

Shum Ba'huur


*/ 

$FIN = microtime(true);
$DUREE = $FIN - $DEBUT;
?>
<p>Site réalisé par Shum Ba'huur.</p>
<p>Grâce aux cours de la <a href="https://3wa.fr/">3W Academy</a></p>
<p>Et aux conseils du site <a href="https://openclassrooms.com">Open Classroom</a></p>
<p>Page générée en : <?= $DUREE ?> ms.</p>
<p>Page générée en : <?= $_SERVER["REQUEST_TIME"] ?> ms.</p>
<p>Actuellement : <?= date('d/m/Y - H:i:s') ?></p>
