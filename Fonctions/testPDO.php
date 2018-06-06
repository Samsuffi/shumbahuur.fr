<?php
/*
Shum Ba'huur
Page fonctions/testPDO.php

Test si PHP<5 (PDO non-compatible) ou si PHP>=5 (PDO compatible)

*/

function testPDO(){
	return strnatcmp(phpversion(),'5.0.0') >= 0 ;
}

