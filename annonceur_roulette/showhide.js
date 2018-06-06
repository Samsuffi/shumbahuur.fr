"use strict";
var rules = document.getElementById("rules");
var title = document.getElementsByTagName("h3")[0];
var eye = title.getElementsByClassName("far")[0];

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

function rulesToggle(){
	if (rules.style.display === "none") {
        rules.style.display = "block";
				title.setAttribute("title", "Cliquez pour montrer");
    } else {
        rules.style.display = "none";
				title.setAttribute("title", "Cliquez pour montrer");
    }
		eye.classList.toggle("fa-eye-slash");
		eye.classList.toggle("fa-eye");
}

// Ajout des events sur le page
addEvent(title , 'click',rulesToggle);

