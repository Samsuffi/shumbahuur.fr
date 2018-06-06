/*---------------------------------------------------------------------*/
/*----------------- Définition des Variables Globales -----------------*/
/*---------------------------------------------------------------------*/
"use strict";
// Pour les calculs
var MAXJETON = 1+1, MINRESULT = 1;
var EPAISSEUR_JETON = 12;
var START, STOP, TIME = 0;
var malusTime = 0;
var players = []; // Création du tableau vide
var resultat, rslt_annonce,	rslt_attendu, txt_annonce, fail;

// Récupération du canvas
var canvas = document.getElementById('canvas_tapis');
var context = canvas.getContext('2d');

// Récupération des élements
var check_aff_nbr = document.getElementById('check_aff_nbr');
var btn_lance = document.getElementById('btn_lance');
var btn_annonce = document.getElementById('btn_annonce');
var msg = document.getElementById('msg_alerte');
var opt_box = document.getElementById('opt_box');
var edit_resultat = document.getElementById('edit_resultat');
var affiche = document.getElementById('affiche');
var btn_jouer = document.getElementById('btn_jouer');

var rules = document.getElementById('rules');

/*
var btn_play1 = document.getElementById('btn_play1');
var btn_play2 = document.getElementById('btn_play2');
var btn_play3 = document.getElementById('btn_play3');
var btn_play4 = document.getElementById('btn_play4');
*/

// Couleurs
var c_rouge = 'rgba(255,0,0,1)',
	c_gris = 'rgba(238,238,238,0.25)',
	c_jaune = 'rgba(232,214,48,1)',
	c_bleu_klein = 'rgba(00,47,167,1)',
	c_white = 'rgba(255,255,255,1)',
	c_noir =  'rgba(0,0,0,1)',
	c_vert_tapis = 'rgba(3,102,53,1)',
	c_jaune_ligne = 'rgba(255,217,64,1)',
	c_ombre = 'rgba(0,0,0,1)',
	c_glass = 'rgba(255,255,255,0.1)',
	c_white_shadow = 'rgba(255,255,255,0.01)',
	c_vine = 'rgba(189, 12, 59,0.5)';

var c_tapis = c_vert_tapis,
	c_ligne = c_jaune_ligne,
	//c_jeton = c_jaune,
	c_jeton = c_bleu_klein,
	c_bord_jeton = c_noir;

// Définitions des positions des Jetons
/*
var SI1X = canvas.width * 0.3, TRX = canvas.width * 0.5, SI2X = canvas.width * 0.7, LIGNE1 = canvas.height * 0.6,
	CA1X = canvas.width * 0.257, CH1X = canvas.width * 0.5, CA2X = canvas.width * 0.743, LIGNE2 = canvas.height * 1.2,
	CH2X = canvas.width * 0.236, PLX = canvas.width * 0.5, CH3X = canvas.width * 0.765, LIGNE3 = canvas.height * 1.50,
	CA3X = canvas.width * 0.214, CH4X = canvas.width * 0.5, CA4X = canvas.width * 0.786, LIGNE4 = canvas.height * 1.8;
*/
//*
var SI1X = canvas.width * 0.4, TRX = canvas.width * 0.6, SI2X = canvas.width * 0.8, LIGNE1 = canvas.height * 0.6,
	CA1X = canvas.width * 0.314, CH1X = canvas.width * 0.514, CA2X = canvas.width * 0.714, LIGNE2 = canvas.height * 1.2,
	CH2X = canvas.width * 0.27, PLX = canvas.width * 0.47, CH3X = canvas.width * 0.67, LIGNE3 = canvas.height * 1.50,
	CA3X = canvas.width * 0.228, CH4X = canvas.width * 0.428, CA4X = canvas.width * 0.628, LIGNE4 = canvas.height * 1.8;
//*/
/*
var SI1X = canvas.width * 0.4, TRX = canvas.width * 0.6, SI2X = canvas.width * 0.8, LIGNE1 = canvas.height * 0.4,
	CA1X = canvas.width * 0.314, CH1X = canvas.width * 0.514, CA2X = canvas.width * 0.714, LIGNE2 = canvas.height * 0.8,
	CH2X = canvas.width * 0.27, PLX = canvas.width * 0.47, CH3X = canvas.width * 0.67, LIGNE3 = canvas.height * 1,
	CA3X = canvas.width * 0.228, CH4X = canvas.width * 0.428, CA4X = canvas.width * 0.628, LIGNE4 = canvas.height * 1.2;
*/

/*---------------------------------------------------------------------*/
/*---------------------- Fonctions évènementielles --------------------*/
/*---------------------------------------------------------------------*/

function init(){
	if(!canvas){
		alert("Impossible de récupérer le canvas");
		return;
	}
	if(!context){
		alert("Impossible de récupérer le context du canvas");
		return;
	}
	msg.style.display = 'none';
	canvas.style.display = 'none';
	edit_resultat.style.display = 'none';
	btn_lance.style.display = 'none';
	btn_annonce.style.display = 'none';
	btn_jouer.style.display = 'inline-block';
}

function Annonce(si1, si2, tr, ca1, ca2, ca3, ca4, ch1, ch2, ch3, ch4, pl){
	this.si = si1 + si2;
	this.tr = tr;
	this.ca = ca1 + ca2 + ca3 + ca4;
	this.ch = ch1 + ch2 + ch3 + ch4;
	this.pl = pl;

	this.getSi = function(){
		return this.si;
	}
	this.getTr = function(){
		return this.tr;
	}
	this.getCa = function(){
		return this.ca;
	}
	this.getCh = function(){
		return this.ch;
	}
	this.getPl = function(){
		return this.pl;
	}

	this.getResult = function(){
		return this.si*5 + this.tr*11 + this.ca*8 + this.ch*17 + this.pl*35;
	}

	this.getTextSi = function(){
		return this.si < 1 ? '' : (this.si < 2 ? this.si + ' sixain' : this.si + ' sixains' ) ;
	}
	this.getTextTr = function(){
		return this.tr < 1 ? '' : (this.tr < 2 ? this.tr + ' transversale' : this.tr + ' transversales' ) ;
	}
	this.getTextCa = function(){
		return this.ca < 1 ? '' : (this.ca < 2 ? this.ca + ' carré' : this.ca + ' carrés' ) ;
	}
	this.getTextCh = function(){
		 return this.ch < 1 ? '' : (this.ch < 2 ? this.ch + ' cheval' : this.ch + ' chevaux' ) ;
	}
	this.getTextPl = function(){
		return this.pl < 1 ? '' : (this.pl < 2 ? this.pl + ' plein' : this.pl + ' pleins' ) ;
	}
	
	this.getTextResult = function(){
		var text = "\n";
		
		if (this.getSi() > 0){text += "\n" + this.getTextSi();}
		if (this.getTr() > 0){text += "\n" + this.getTextTr();}
		if (this.getCa() > 0){text += "\n" + this.getTextCa();}
		if (this.getCh() > 0){text += "\n" + this.getTextCh();}
		if (this.getPl() > 0){text += "\n" + this.getTextPl();}
		
		return text;
	}
}

function lancer(){
	do{
		var nbr_si1 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_si2 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_tr = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_ca1 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_ca2 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_ca3 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_ca4 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_ch1 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_ch2 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_ch3 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_ch4 = Math.floor(Math.random()*Math.floor(MAXJETON)) ,
			nbr_pl = Math.floor(Math.random()*Math.floor(MAXJETON)) ;
		
		/*
		// Pour une annonce personnalisée
		var nbr_si1 = 1,	nbr_si2 = 1,	nbr_tr = 1, nbr_ca1 = 1, nbr_ca2 = 1, nbr_ca3 = 1, nbr_ca4 = 1, nbr_ch1 = 1, nbr_ch2 = 1, nbr_ch3 = 1, nbr_ch4 = 1, nbr_pl = 1;
		*/
		
		var obj_annonce = new Annonce(nbr_si1, nbr_si2, nbr_tr, nbr_ca1, nbr_ca2, nbr_ca3, nbr_ca4, nbr_ch1, nbr_ch2, nbr_ch3, nbr_ch4,nbr_pl);
		

		resultat = obj_annonce.getResult();
		txt_annonce = obj_annonce.getTextResult();
		fail = 0;

	}while(resultat < MINRESULT );

	btn_lance.style.display = 'none';
	btn_annonce.style.display = 'inline-block';
	affiche.innerHTML = '';
	edit_resultat.style.display = 'inline-block';
	edit_resultat.value = '' ;
	edit_resultat.focus();
	if(window.location.host == 'localhost'){
		edit_resultat.value = resultat ;
	}

	/*
	switch(players.length){
		case 4 : btn_play4.style.display = '';
				btn_play4.innerHTML = players[3] + ' annonce !';
				addEvent(btn_play4, 'click', annoncer);
		case 3 : btn_play3.style.display = '';
				btn_play3.innerHTML = players[2] + ' annonce !';
				addEvent(btn_play3, 'click', annoncer);
		case 2 : btn_play2.style.display = '';
				btn_play2.innerHTML = players[1] + ' annonce !';
				addEvent(btn_play2, 'click', annoncer);
		case 1 : btn_play1.style.display = '';
				btn_play1.innerHTML = players[0] + ' annonce !';
				addEvent(btn_play1, 'click', annoncer);
	}
	//*/


	// Gestion de l'affichage du tapis
	drawTapis();
	drawStack(SI1X, LIGNE1, nbr_si1); drawStack(TRX, LIGNE1, nbr_tr); drawStack(SI2X, LIGNE1, nbr_si2);
	drawStack(CA1X, LIGNE2, nbr_ca1); drawStack(CH1X, LIGNE2, nbr_ch1); drawStack(CA2X, LIGNE2, nbr_ca2);
	drawStack(CH2X, LIGNE3, nbr_ch2); drawStack(PLX, LIGNE3, nbr_pl); drawStack(CH3X, LIGNE3, nbr_ch3);
	drawStack(CA3X, LIGNE4, nbr_ca3); drawStack(CH4X, LIGNE4, nbr_ch4); drawStack(CA4X, LIGNE4, nbr_ca4);

	// Lancement du timer (après exécution du script)
	START = new Date().getTime();
}

function annoncer(){
	rslt_annonce = parseInt(edit_resultat.value);
	rslt_attendu = resultat;

	if(rslt_annonce === rslt_attendu){
		// on stoppe le plus vite possible
		STOP = new Date().getTime();
		malusTime = fail * 60000;
		TIME = calculTemps(STOP - START + malusTime);

		//affiche.innerHTML = "C'est ça !";
		affiche.innerHTML = 'Cliquer sur "Lancer" pour lancer le tour';
		btn_lance.style.display = 'inline-block';
		btn_annonce.style.display = 'none';
		/*
		btn_play1.style.display = 'none';
		btn_play2.style.display = 'none';
		btn_play3.style.display = 'none';
		btn_play4.style.display = 'none';
		*/
		edit_resultat.style.display = 'none';
		drawBravo();
		// TODO : à virer si l'autre solution marche (ecrire sur le tapis)
		alert('C\'est ça !\nVous avez trouvé en \n' + TIME);

		// Variation de la difficulté en fonction du temps
		if (STOP - START < 10000){
			MAXJETON = MAXJETON + 0.2;
		} else if (STOP - START> 90000){
			MAXJETON = MAXJETON - 0.2;
			if(MAXJETON < 1){
				MAXJETON = 1;
			}
		}
	} else {
		//affiche.innerHTML = '"tut tut"' + txt_annonce ;
		alert("tut tut " + "!".repeat(fail++) + txt_annonce);
		if(fail > 5){
			alert("Mauvais !\n\n\t" + rslt_attendu + "\n\n");
		}
	}
	// On efface l'editBox quoi qu'il arrive
	// Cela permet également de récupérer le curseur ;)
	edit_resultat.focus();
	edit_resultat.value = '' ;
}

/*---------------------------------------------------------------------*/
/*------------------------------- Dessins -----------------------------*/
/*---------------------------------------------------------------------*/

function drawTapis(){
	// Clear de l'image
	context.clearRect(0,0,canvas.width,canvas.height);

	// Tapis - Fond
	context.fillStyle = c_tapis;
	context.fillRect(0, 0, canvas.width, canvas.height);

	// Tapis - Lignes
	context.beginPath();
	context.lineWidth = 1;

	// Lignes horizontales
	context.moveTo(0, LIGNE1/2-canvas.height*0.01);
	context.lineTo(canvas.width, LIGNE1/2-canvas.height*0.01);
	for(var i=LIGNE1/2; i<=canvas.height ; i += canvas.height * 0.3){
		context.moveTo(0, i);
		context.lineTo(canvas.width, i);
	}
	// lignes verticales
	/*
	for(var i=canvas.width * 0.4 ; i<canvas.width ; i += canvas.width * 0.4){
		context.moveTo(i, canvas.height * 0.3);
		context.lineTo(i-canvas.width * 0.2, canvas.height);
	}
	/**/
	/*
	context.moveTo(canvas.width * 0.3, canvas.height * 0.3);
	context.lineTo(canvas.width * 0.3-canvas.width * 0.1, canvas.height);
	context.moveTo(canvas.width * 0.7, canvas.height * 0.3);
	context.lineTo(canvas.width * 1.0-canvas.width * 0.2, canvas.height);
	/**/
	context.moveTo(canvas.width * 0.4, canvas.height * 0.3);
	context.lineTo(canvas.width * 0.4-canvas.width * 0.2, canvas.height);
	context.moveTo(canvas.width * 0.8, canvas.height * 0.3);
	context.lineTo(canvas.width * 0.8-canvas.width * 0.2, canvas.height);
	// Dessin du Tapis
	context.strokeStyle = c_ligne;
	context.stroke();
	context.closePath();
}

function drawBravo(){

	/*
	context.beginPath();
	context.lineWidth = 1;

	context.moveTo(0, canvas.height/2);
	context.lineTo(canvas.width, canvas.height/2);

	context.moveTo(canvas.width/2, 0);
	context.lineTo(canvas.width/2, canvas.height);

	context.strokeStyle = c_rouge;
	context.stroke();
	context.closePath();

	context.strokeRect(canvas.width/2 - 80 , canvas.height/2 - 100, 160, 200);
	*/

	// Message
	var msg_bravo = "";
	context.font = '30px Helvetica';
	context.fillStyle = c_rouge;
	context.fillText(msg_bravo, 10, 50);

	//Resultat
	var msg_rslt = rslt_annonce +' pièces';
	context.font = '30px Helvetica';
	context.fillStyle = c_ombre;
	context.fillText(msg_rslt, 51, 51);
	context.fillStyle = c_rouge;
	context.fillText(msg_rslt, 50, 50);


	//Temps
	msg_rslt = ' Temps : ' + TIME ;
	context.font = '30px Helvetica';
	context.fillStyle = c_ombre;
	context.fillText(msg_rslt, 251, 51);
	context.fillStyle = c_rouge;
	context.fillText(msg_rslt, 250, 50);
}

function draw1Jeton(posx,posy){

	var x = parseInt(posx), y = parseInt(posy) ;
	// TODO : trouver le diamètre idéal
	var RAY = Math.min(canvas.width,canvas.height) * 0.09 ; //(min 0.06, max 0.10)
	var decal =  Math.floor(Math.random()*25);

	// On enregistre le context actuel, AVANT de créer l'effet de perspective
	context.save();
	context.scale(1, 0.5);

	for(var i=0; i <= EPAISSEUR_JETON ; i++){
		if(i == 0 || i == EPAISSEUR_JETON){
			context.lineWidth = 1;
			context.beginPath();
			context.arc(x, y-i, RAY, 0, Math.PI*2);
			context.strokeStyle = c_bord_jeton;
			//context.stroke();
			context.closePath();
			/*if(i==0){
				context.moveTo(x,y-i);
				context.beginPath();
				context.arc(x, y-i, 3, 0, Math.PI*2);
				context.strokeStyle = 'red';
				context.stroke();
				context.closePath();
			}*/
		}

		context.beginPath();
		context.fillStyle = c_jeton;
		context.arc(x, y-i, RAY, 0, Math.PI*2);
		context.fill();
		context.closePath();

		/*
		un Tour = PI*2
		donc circ += 0.25 => 8x dans le tour (0.5 = 4x, 1 = 2x, 0.125 = 16x...)
		2/0.25 = 8
		2/0.5 = 4
		2/24 = 0.083333
		*/

		// Traits autour du jeton (2/ [nombre de traits])
		for(var circ = 0;circ <= 2;circ += 2/11){
				context.beginPath();
				context.fillStyle  = c_white;
				context.arc(x,y-i,RAY, Math.PI*circ+decal, Math.PI*circ+decal+Math.PI*0.03,0);
				context.lineTo(x, y-i);
				context.fill();
				context.closePath();
		}

		// Rond central du jeton
		if(i == EPAISSEUR_JETON){
			context.beginPath();
			context.strokeStyle = c_jeton;
			context.arc(x, y-i, RAY-7, 0, Math.PI*2);
			context.lineWidth = 8;
			context.stroke();
			context.closePath();
			/*
			// ne s'affiche pas avec linewidth 0.1
			context.beginPath();
			context.strokeStyle = c_bord_jeton;
			context.arc(x, y-i, RAY-11, 0, Math.PI*2);
			context.lineWidth = 0.1;
			context.stroke();
			context.closePath();

			context.beginPath();
			context.strokeStyle = c_bord_jeton;
			context.arc(x, y-i, RAY-13, 0, Math.PI*2);
			context.lineWidth = 0.1;
			context.stroke();
			context.closePath();
			*/
			context.beginPath();
			context.strokeStyle = c_jeton;
			context.arc(x, y-i, RAY-17, 0, Math.PI*2);
			context.lineWidth = 8;
			context.stroke();
			context.closePath();

		}
	}
	// on restore le context par défaut
	context.restore();
}

function draw5Jeton(posx,posy){
	for(var i =0;i<5;i++){
		draw1Jeton(posx,posy-i*(EPAISSEUR_JETON));
	}
}

function draw10Jeton(posx,posy){
	draw5Jeton(posx,posy);
	draw5Jeton(posx-10,posy-EPAISSEUR_JETON*6);
}

function drawStack(posx, posy, nombre){
	var x = posx, y = posy ;
	if(nombre> 0){
		var nbr = nombre ;
		while(nbr> 9){
			x = posx;
			draw10Jeton(x,y);
			nbr -= 10;
			x -= 10;
			y -= EPAISSEUR_JETON*11 + 15;
		}
		while(nbr> 4){
			x = posx;
			draw5Jeton(x,y);
			nbr -= 5;
			y -= EPAISSEUR_JETON*5 + 15;
		}
		while(nbr> 0){
			draw1Jeton(x,y);
			nbr -= 1;
			x -= 2;
			y -= EPAISSEUR_JETON + 15;
		}
	}
	// Ajout d'une dolly sur le plein [PLX;LIGNE3]
	if(posx == PLX){
		/*drawDolly(x+2,y+10);*/
	}
}
/*---------------------------------------------------------------------*/
/*------------------------ DOLLY VERRE --------------------------------*/
/*---------------------------------------------------------------------*/

function drawDolly(posx, posy){

	var x = parseInt(posx), y = parseInt(posy) ;
	// TODO : trouver le diamètre idéal
	var RAY = Math.min(canvas.width,canvas.height) * 0.06 ; //(min 0.06, max 0.10)

	// On enregistre le context actuel, AVANT de créer l'effet de perspective
	context.save();
	context.scale(1, 0.5);

	//*
	// Le pied
	for(var i=0; i <= 70 ; i++){
		/*if(i == 0 || i == 99){
			context.lineWidth = 1;
			context.beginPath();
			context.arc(x, y-i, RAY, 0, Math.PI*2);
			context.strokeStyle = 'red';
			context.stroke();
			context.closePath();
		}*/

		if(i==0){
			ray = RAY-4;
		}else if(i < 10){
			ray = RAY - i * 2.8;
			ray = ray> 3 ? ray : 4;
		}

		context.beginPath();
		context.fillStyle = c_glass;
		context.arc(x, y-i, ray, 0, Math.PI*2);
		context.fill();
		context.closePath();

		context.beginPath();
		context.strokeStyle = c_glass;
		context.arc(x, y-i, ray-3, 0, Math.PI*2);
		context.lineWidth = 6;
		context.stroke();
		context.closePath();
	}

	// la boule
	//  position du curseur de dessin
	for(var i = 70 ; i < 200 ; i++){
		/*if(i == 70 || i == 169){
			context.lineWidth = 1;
			context.beginPath();
			context.arc(x, y-i, RAY, 0, Math.PI*2);
			context.strokeStyle = 'red';
			context.stroke();
			context.closePath();
		}*/

		var ray;
		var remplissage = c_white_shadow;

		// un peu de liquide dans le verre, c'est sympa
		if(i>= 70 && i <= 50 + MAXJETON * 10 && i <= 190)
			remplissage = c_vine;

		//variation du rayon pour l'effet "verre"
		if(i <= 70)
			ray = 6;
		else if(i < 120 && ray < RAY)
			ray += 0.9;
		else if(i < 170 && ray>= 0)
			ray = ray-.15;

		ray = ray> 6 ? ray : 7;

		context.beginPath();
		context.fillStyle = remplissage;
		context.arc(x, y-i, ray-6, 0, Math.PI*2);
		context.fill();
		context.closePath();

		context.beginPath();
		context.strokeStyle = 'rgba(255,255,255,0.1)';
		context.arc(x, y-i, ray-2, 0, Math.PI*2);
		context.lineWidth = 4;
		context.stroke();
		context.closePath();
	}
	// on restore le context par défaut
	context.restore();
}

/*---------------------------------------------------------------------*/
/*----------------------- Gestion des évènements ----------------------*/
/*---------------------------------------------------------------------*/

// fonction de Compatibilité avec IE
function addEvent(el, event, func) {
	if(el.addEventListener) { // Si notre élément possède la méthode addEventListener()
		el.addEventListener(event, func, false);
	} else { // Si notre élément ne possède pas la méthode addEventListener()
		el.attachEvent('on'+event, func);
	}
}

function removeEvent(el, event, func) {
	if(el.removeEventListener) {
		el.removeEventListener(event, func, false);
	} else {
		el.detachEvent('on'+event, func);
	}
}

function btnEnter(event){
	event = event || windows.event;
	if(event.keyCode==13){
		if(btn_lance.style.display == 'inline-block'){
			lancer();
		} else if (btn_annonce.style.display == 'inline-block'){
			annoncer();
		} else if (btn_jouer.style.display == 'inline-block'){
			play();
		} else {
			alert('J\'ai pas réussi à trouver ce bug, merci de me le signaler ;) ');
		}
	}
}

// Ajout des events sur le page
addEvent(window, 'load', init);
addEvent(window, 'load', drawTapis);
addEvent(document, 'keydown', btnEnter);
addEvent(btn_lance , 'click', lancer);
addEvent(btn_annonce, 'click', annoncer);

addEvent(btn_jouer, 'click', play);


function JouerSeul(){
	// Suppression du bouton Play et suppression des évenements associés
	removeEvent(btn_jouer, 'click', play);

	// Lancement du jeu (affichage canvas, bouton "Lancer" et EditBox)
	canvas.style.display = 'inline-block';
	btn_lance.style.display = 'inline-block' ;
}
/*
function savePlayers(){
	var player;
	var liste = [];
	while (player = prompt('Entrez un prénom pour le joueur '+ (liste.length +1) +' :\n(laisser vide pour terminer)')) { // Si la valeur assignée à la variable "nick" est valide (différente de "null") alors la boucle s'exécute
		liste.push(player); // Ajoute le nouveau prénom au tableau
		if (liste.length> 3){
			break ;
		}
	}

	if (liste.length < 1) {
		liste[0] = 'Croupier';
	}

	return liste;
}
*/
function play(){
	/*if(window.location.host != 'localhost'){
		players = savePlayers();
	} else {
		players[0] = 'test';
	}
	*/
	btn_jouer.style.display = 'none';
	removeEvent(btn_jouer, 'click', play);
	
	canvas.style.display = 'inline-block';
	affiche.innerHTML = 'Cliquer sur "Lancer" pour lancer le tour';
	btn_lance.style.display = 'inline-block' ;
	
	rules.style.display = 'none';
	window.location.hash = '#game';
}

function calculTemps(duree){
	// duree est un millisecondes !
	var temps = Math.ceil(duree/1000);
	var secondes = Math.floor(temps%60);
	var minutes = Math.floor(temps/60);

	minutes = minutes < 10 ? '0' +  minutes : minutes ;
	secondes = secondes < 10 ? '0' + secondes : secondes ;

	return minutes + ':' + secondes ;
}
// Fin


//*
// Petit bout de code qui ne s'affiche que si tout le reste du code est complet ;)
// ET si on est sur localhost :D
if(window.location.host == 'localhost'){
	//alert('Tous les scripts se sont bien executés');
}
//*/
