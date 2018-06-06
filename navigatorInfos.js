/*

Function navigatorInfos()

*/
function navigatorInfos(){
	var txt;
	txt = "Nom de code: " + navigator.appCodeName;
	txt += "Nom du navigateur : " + navigator.appName;
	txt += "Version : " + navigator.appVersion ;
	txt += "Cookies activés : " + navigator.cookieEnabled;
	txt += "Plate-forme: " + navigator.platform;
	txt += "En-tête d'agent utilisateur : " + navigator.userAgent;
}