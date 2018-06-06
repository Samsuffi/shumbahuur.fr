<?php 
/*/
if($bdd->errorInfo()){
	print_r($bdd->errorInfo());
	var_dump($bdd->errorInfo());
}
/**/
/*

//if($_SERVER['HTTP_HOST'] == 'localhost'){ 

echo "<div>";

echo "Version de php : " . phpversion() . "<br/>";

if (testPDO())
	echo 'Version compatible PDO<br/>';
else
	echo 'Version non compatible PDO<br/>';


echo 'Macic quotes : '. get_magic_quotes_gpc() .'<br />';
echo ROOTPATH . '<br/>';
//phpinfo ();


echo '<hr>$_SERVEUR : <br/>';
foreach($_SERVER as $cle => $valeur){
	echo $cle .' => '. $valeur .'<br />';
}


echo '<hr>$_SESSION : <br/>';
foreach($_SESSION as $cle => $valeur){
	echo $cle .' => '. $valeur .'<br />';
}

echo '<hr>$_COOKIE : <br/>';
foreach($_COOKIE as $cle => $valeur){
	echo $cle .' => '. $valeur .'<br />';
}

echo "</div>";
//} 
//*/