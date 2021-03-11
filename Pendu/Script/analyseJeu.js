//déclaration des variables globales nécessaires à toutes les fonctions
////var lesMots = new Array("MAINTENANT","ALORS", "DEPUIS", "PRESQUE","POURQUOI", "TEMPS", "ALABAMA")
var lettresTrouvees  = new Array() ; //tableau qui contiendra les lettres trouvées au fur et à mesure
var mot=""; //mot donné aléatoirement à partir du tableau lesMots
var coups = 0;
var now = new Date();
var jour = now.getDate();
var mois = now.getMonth()+1;
var an = now.getFullYear();
var heure = now.getHours();
var minutes = now.getMinutes();
var secondes = now.getSeconds();


function commencer() { 
	mot=motATrouver(); //mot donné aléatoirement à partir du tableau lesMots
	alert("DEBUG : le mot à trouver est : "+ mot);
}
function motAafficher() {
    document.getElementById("motCherche").innerHTML = " MOT A TROUVER : ";

	/*Affiche les lettres trouvées dans le document HTML (id du HTML = motCherche)*/
	for (var j=0;j<lettresTrouvees.length;j++){
		document.getElementById("motCherche").innerHTML += lettresTrouvees[j] +"  ";
		}
	}

function aleatoire(min, max) { 
	return (Math.floor((max-min)*Math.random())+min); 
} 

function motATrouver() {
	//appelle la fonction aléatoire
	////var i = aleatoire(0, lesMots.length);
	//prend le mot à la position i dans le tableau lesMots
	var mot = document.getElementById("motCherche").innerHTML;
	//initialise le tableau lettreTrouvées avec la longueur du mot à trouver (mot.length)
	for (var j=0;j< mot.length;j++){
		//initialise le tableau avec des _  (aucune lettre n'a été trouvée)
		lettresTrouvees[j] = " _ " ;
	}
	motAafficher();
	return mot;
	}

function jouer(lettre) { 
	var position = -1 ; 
	var lettreCliquee = lettre.id;
	alert("DEBUG : lettre cliquee est : "+lettreCliquee);
    lettre.setAttribute("disabled", "disabled");

	// indexOf(str) retourne la position de str dans la chaîne ici mot (-1 si elle n'est pas trouvée))

	if (mot.indexOf(lettreCliquee) == -1)
    {
        if (coups < 8)
        {
            coups++;
        }
		alert("Cette lettre n'est pas dans le mot à trouver, il vous reste "+(8 - coups)+" chance(s) !");
        document.getElementsByTagName("img")[0].setAttribute("src", "Images/coup"+coups+".png");
        
        if (coups == 8)
        {
            alert("PENDU, vous avez perdu :(");
			document.getElementById("tabLettre").setAttribute("disabled", "disabled");
			document.getElementById("tabLettre").innerHTML = "le "+jour+"/"+mois+"/"+an+" "+heure+":"+minutes+":"+secondes+", le mot était : "+mot+" : vous avez utilisé tous vos coups.";
			document.getElementById("rej").style = "display:show";
			document.getElementById("ind").style = "display:none";
			document.getElementById("definition").style = "display:none";
		}
	}
    
    if (coups != 8) //la lettre existe dans le mot
    {
		
		for (var l = 0; l < mot.length; l++)
        {
            if (mot[l] == lettreCliquee)
            {
                position = mot.indexOf(lettreCliquee);
                lettresTrouvees[l] = lettreCliquee;
                alert("Votre lettre se trouve à la position : "+(l + 1)+" du mot à trouver.");
            }
        }
        
		// affiche les lettres trouvees du mot
		motAafficher();
            

		if (trouver() == true)
        {
            alert("BRAVO !!! Vous avez bien trouvé toutes les lettres du mot, il vous restait encore "+(8 - coups)+" chance(s).");
            document.getElementById("tabLettre").setAttribute("disabled", "disabled");
			document.getElementsByTagName("img")[0].setAttribute("src", "Images/gagne.png");
			document.getElementById("tabLettre").innerHTML = "le "+jour+"/"+mois+"/"+an+" "+heure+":"+minutes+":"+secondes+", le mot était : "+mot+" : "+coups+" coup(s) utilisé(s) sur 8";
			document.getElementById("rej").style = "display:show";
			document.getElementById("ind").style = "display:none";
			document.getElementById("definition").style = "display:none";
		}
	}
}

function trouver() {
	//fonction qui vérifie que toutes les lettres ont été trouvées
	var trouve = true ;
	//parcours chaque lettre du mot jusqu'à la longueur du mot
	for (var j=0;j<mot.length;j++){
			//vérifie s'il reste des _  dans le tableau des lettres trouvées, 
			//dans ce cas, il n'a pas trouvé toutes les lettres
			if (lettresTrouvees[j] == " _ " ){
				trouve = false ;
			}
		}
	return trouve ;
}

function indice() {
	var Def = document.getElementById("definition");
if (Def.style.visibility == "hidden"){
 Def.style.visibility = "visible";
}
else{
Def.style.visibility = "hidden";
}
}