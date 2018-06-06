<?php
/*
	Shum Ba'huur
	15/04/2018
*/
if($_SERVER['HTTP_HOST'] != "localhost"){
	die("En cours de développement");
}

?>
<!--
<style>
	h1{
		color: green;
	}
	#hud *{
		border: 1px dotted maroon;
	}
	section#hud{
		width: 100%;
		height: auto;
		border: 1px dotted green;
		
		display: flex;
		flex-flow: row nowrap;
	}
	#vue{
		width: 75%;
		
		
	}
	#vue /*.truc*/{
		border: 2px inset #eee;
		height: 20em;
		overflow: auto;
	}
	#border{
		width: 25%;
	}
	#border ul{
		padding: 0;
		margin: 0;
		list-style: none;
		
	}
	#stats progress{
		width: 100%;
	}
	#actions{
		display: flex;
		flex-flow: row wrap;
		margin-bottom: 0;
		height: 50%;
		text-align: center;
	}
	#actions button{
		width: 48%;
		margin: 1%;
	}
</style>
-->

<div id="rider">
	<h2>Dungeon Raider</h2>
	
	<div id="hud">
		
		<div id="vue"><!-- addClass(truc) quand jeu en cours -->
			
			<p>- boutons controles (inventaire)<br>
		- PV ! & mana ?
		- 
		
		- js acceuil/dead.</p>
			
			<p>Durant votre jeunesse, votre grand-père vous racontais souvent cette histoire à propos d'un souterrain qu'il aurait exploré par la passé</p>
			<p>Cette journée avait pourtant bien commencé ; un soleil radieu </p>
			<p>faut voir quand je rajoute des trucs.</p>
		</div>
		
		<div id="border">
			<div id="stats">
				<ul>
					<li>Nom : </li>
					<li id="nom">Yop</li>
					<li title="Points de Vie">PV :</li>
					<li><progress value="25" max="100">50%</progress></li>
					<li><progress value="70" max="100">70 %</progress></li>
				</ul>
			</div>
			
			<div id="actions">
				<button>Bouton1</button>
				<button>Bouton2</button>
				<button>Bouton3</button>
				<button>Bouton4</button>
				<button>Bouton5</button>
				<button>Bouton6</button>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="<?= ROOTPATH ?>/dungeon_raider/dungeon_raider.js"></script>
