<?php
/*
Shum Ba'huur
Page gar.php

Générateur d'Annonces Roulette [...]

*/

class Annonce{
	public $nbr_six, $nbr_tra, $nbr_car, $nbr_che, $nbr_ple ;
	public $txt_six, $txt_tra, $txt_car, $txt_che, $txt_ple ;
	private $resultat;
	
	private $max_jetons = 3 ;
	
	function __construct(){
		$this->nbr_six = mt_rand(0,$this->max_jetons);
		$this->nbr_tra = mt_rand(0,$this->max_jetons);
		$this->nbr_car = mt_rand(0,$this->max_jetons);
		$this->nbr_che = mt_rand(0,$this->max_jetons);
		$this->nbr_ple = mt_rand(0,$this->max_jetons);
		
		$this->resultat = $this->nbr_six * 5 +
							$this->nbr_tra * 11 +
							$this->nbr_car * 8 +
							$this->nbr_che * 17 +
							$this->nbr_ple * 35 ;
					
		$this->txt_six = $this->nbr_six < 2 ? 'Sixain' : 'Sixains' ;
		$this->txt_tra = $this->nbr_tra < 2 ? 'Transversale' : 'Transversales' ;
		$this->txt_car = $this->nbr_car < 2 ? 'Carré' : 'Carrés' ;
		$this->txt_che = $this->nbr_che < 2 ? 'Cheval' : 'Chevaux' ;
		$this->txt_ple = $this->nbr_ple < 2 ? 'Plein' : 'Pleins' ;
		
		//$this->save();
	}
	
	function save(){
		$bdd = connexionbdd();
		
		$update = $bdd->prepare('INSERT INTO gar VALUES ("",:nbrSix,:nbrTra,:nbrCar,:nbrChe,:nbrPle)');
		$update->execute(array('nbrSix' => $this->nbr_six,
								'nbrTra' => $this->nbr_tra,
								'nbrCar' => $this->nbr_car,
								'nbrChe' => $this->nbr_che,
								'nbrPle' => $this->nbr_ple)
								);
	}
	
	function getResultat(){
		return $this->resultat;
	}
}

$annonce = new Annonce();
?>
<?php
if(isset($_POST['edt_resultat'])){
	$edt_resultat = (int) strip_tags($_POST['edt_resultat']) ;
}
?>
<div id='corps'>
	<h1><a href="<?php echo ROOTPATH . '/Autres/gar' ; ?>">Générateur d'Annonces Roulette</a></h1>
	
	<p id="msg_alerte">Pour accéder à toutes les fonctionnalités de ce site, vous devez activer JavaScript.<br />
		Voici les <a href="http://www.enable-javascript.com/fr/" target="_blank">
		instructions pour activer JavaScript dans votre navigateur Web</a>.
	</p>
	
	<canvas id="canvas_tapis" width="500" height="500" style="border:1px solid red;display:none">
		Message pour les navigateurs ne supportant pas encore canvas.
	</canvas>
	
	
	
	<p style='min-height:8em;' ><table>
	<?php
		if($annonce->nbr_six > 0){
			echo '<tr><td>'.$annonce->nbr_six.'</td><td>'. $annonce->txt_six .'</td></tr>';
		}
		if($annonce->nbr_tra > 0){
			echo '<tr><td>'.$annonce->nbr_tra.'</td><td>'. $annonce->txt_tra .'</td></tr>';
		}
		if($annonce->nbr_car > 0){
			echo '<tr><td>'.$annonce->nbr_car.'</td><td>'. $annonce->txt_car .'</td></tr>';
		}
		if($annonce->nbr_che > 0){
			echo '<tr><td>'.$annonce->nbr_che.'</td><td>'. $annonce->txt_che .'</td></tr>';
		}
		if($annonce->nbr_ple > 0){
			echo '<tr><td>'.$annonce->nbr_ple.'</td><td>'. $annonce->txt_ple .'</td></tr>';
		}
	?>
	</table></p>
	
	<form method='get' action='#corps'>
		<input type='text' id='edt_resultat' name='edt_resultat' 
			<?php if($_SERVER['HTTP_HOST'] == 'localhost'){
				echo "value='". $annonce->getResultat() ."'" ;
			} ?>
		/>
		<br />
		<input type='submit' id='btn_annoncer' value='Annoncer' />
	</form>
</div>

<script type="text/javascript" src="gar.js"></script>
