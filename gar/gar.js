/*
Shum Ba'huur
Page gar.js

Page de scritps du gar !

*/
// Récupération du canvas
var canvas = document.getElementById('canvas_tapis');
var context = canvas.getContext('2d');



var SI1X = canvas.width * 0.4, TRX = canvas.width * 0.6, SI2X = canvas.width * 0.8, LIGNE1 = canvas.height * 0.6,
	CA1X = canvas.width * 0.314, CH1X = canvas.width * 0.514, CA2X = canvas.width * 0.714, LIGNE2 = canvas.height * 1.2,
	CH2X = canvas.width * 0.27, PLX = canvas.width * 0.47, CH3X = canvas.width * 0.67, LIGNE3 = canvas.height * 1.50,
	CA3X = canvas.width * 0.228, CH4X = canvas.width * 0.428, CA4X = canvas.width * 0.628, LIGNE4 = canvas.height * 1.8;

function AffJetons(){
	draw1Jeton(200,200);
}

function verifieResultat(){
	alert('ok');
	return false;
}


/*---------------------------------------------------------------------*/
/*------------------------------- Dessins -----------------------------*/
/*---------------------------------------------------------------------*/


function drawTapis(){
	// Clear de l'image
	context.clearRect(0,0,canvas.width,canvas.height);
	
	// Tapis - Fond
	context.fillStyle = 'rgba(3,102,53,1)';
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
	context.moveTo(canvas.width * 0.4, canvas.height * 0.3);
	context.lineTo(canvas.width * 0.4-canvas.width * 0.2, canvas.height);
	context.moveTo(canvas.width * 0.8, canvas.height * 0.3);
	context.lineTo(canvas.width * 0.8-canvas.width * 0.2, canvas.height);
	// Dessin du Tapis
	context.strokeStyle = 'rgba(255,217,64,1)';
	context.stroke();
	context.closePath();
}

function draw1Jeton(posx,posy){
	
	var x = parseInt(posx), y = parseInt(posy) ;
	// TODO : trouver le diamètre idéal
	var RAY = Math.min(canvas.width,canvas.height) * 0.09 ; //(min 0.06, max 0.10)
	var decal =  Math.floor(Math.random()*25);
	
	// On enregistre le context actuel, AVANT de créer l'effet de perspective
	context.save();
	context.scale(1, 0.5);
	
	for(var i=0; i<10 ; i++){
		if(i == 0 || i == 9){
			context.lineWidth = 1;
			context.beginPath();
			context.arc(x, y-i, RAY, 0, Math.PI*2);
			context.strokeStyle = 'rgba(0,0,0,1)';
			context.stroke();
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
		context.fillStyle = 'rgba(00,47,167,1)';
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
		for(circ=0;circ<=2;circ+=2/12){
				context.beginPath();
				context.fillStyle  = 'rgba(255,255,255,1)';
				context.arc(x,y-i,RAY, Math.PI*circ+decal, Math.PI*circ+decal+Math.PI*0.03,0);
				context.lineTo(x, y-i);
				context.fill();
				context.closePath();
		}
		
		// Rond central du jeton
		if(i == 9){
			
			context.beginPath();
			context.strokeStyle = 'rgba(00,47,167,1)';
			context.arc(x, y-i, RAY-7, 0, Math.PI*2);
			context.lineWidth = 8;
			context.stroke();
			context.closePath();
			
			context.beginPath();
			context.strokeStyle = 'rgba(0,0,0,1)';
			context.arc(x, y-i, RAY-11, 0, Math.PI*2);
			context.lineWidth = 0.1;
			context.stroke();
			context.closePath();
			
			context.beginPath();
			context.strokeStyle = 'rgba(0,0,0,1)';
			context.arc(x, y-i, RAY-13, 0, Math.PI*2);
			context.lineWidth = 0.1;
			context.stroke();
			context.closePath();
			
			context.beginPath();
			context.strokeStyle = 'rgba(00,47,167,1)';
			context.arc(x, y-i, RAY-17, 0, Math.PI*2);
			context.lineWidth = 8;
			context.stroke();
			context.closePath();
			
		}
	}
	// on restore le context par défaut
	context.restore();
	EPAISSEUR_JETON = i;
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
	if(nombre > 0){
		var x = posx, y = posy, nbr = nombre ;
		while(nbr > 9){
			x = posx;
			draw10Jeton(x,y);
			nbr -= 10;
			x -= 10;
			y -= EPAISSEUR_JETON*11 + 15;
		}
		while(nbr > 4){
			x = posx;
			draw5Jeton(x,y);
			nbr -= 5;
			y -= EPAISSEUR_JETON*5 + 15;
		}
		while(nbr > 0){
			draw1Jeton(x,y);
			nbr -= 1;
			x -= 2;
			y -= EPAISSEUR_JETON + 15;
		}
	}
}


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
	document.getElementById('msg_alerte').style.display = 'none';
	canvas.style.display = '';
	drawTapis();
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
		if(btn_lance.style.display == ''){
			lancer();
		} else if (btn_annonce.style.display == ''){
			annoncer();
		} else {
			//alert('J\'ai pas réussi à trouver ce bug, merci de me le signaler ;) ');
		}
	}
}


var bouton = document.getElementById('btn_annoncer');

addEvent(window, 'load', init);
addEvent(bouton, 'click', AffJetons);
addEvent(bouton, 'click', verifieResultat);
//*
// Petit bout de code qui ne s'affiche que si tout le reste du code est complet ;)
// ET si on est sur localhost :D
if(window.location.host == 'localhost'){
	//alert('Tous les scripts se sont bien executés');
}
//*/


