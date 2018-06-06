"use strict";
var vue = $("#vue");
//console.log(vue);


var Joueur = function(){
	this.name;
	this.PV = parseInt(75);
}
Joueur.prototype.setName = function(){
	// TODO : protéger l'entrée
	var inputName = prompt("Choisissez un nom", "Romain");
	
	this.name = inputName;
	
	// TODO: protéger l'affichage
	$("#nom").html(this.name);
}

Joueur.prototype.getPV = function(){
	$("progress")[0].setAttribute("value", this.PV);
}

var game = function(){
	var joueur = new Joueur();
	
	var bienvenue = "Bienvenue";
	var vue = $("#vue");
	
	// init
	//joueur.setName();
	joueur.getPV();
	
	// intro
	$("#vue").html("");
	$("#vue").append(document.createTextNode(bienvenue));
	
	// Explications + btn skip (ou "Commencer")
	vue.html("hello");
	
	
	
}

game();


























console.log("Tous les scripts se sont bien executés");