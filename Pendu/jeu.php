
<!-- VUKELIC NICOLAS-->


<!DOCTYPE html>
	<html lang='fr'>
	<head>
	<title> jeu du PENDU ! Version1 </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="keywords" lang="fr" content="BTS,SIO,informatique,etude, technicien" />
	<meta name="description" content="Jeu du pendu en BTS Services Informatiques aux Organisations (S.I.O)." />

	
	<link rel='stylesheet' type='text/css' href='Style/knacss.css'/>
	<link rel='stylesheet' type='text/css' href='Style/styles.css'/>

	<!-- lien fichier JS -->
	<script type='text/javascript' src='Script/analyseJeu.js'></script>

</head>
<body onload="commencer();">
	<header id="header" role="banner" class="pam">
    BTS S.I.O (Services Informatiques aux Organisations)
  </header>
<div class="flex-container">
    <aside class="mod w20 pam aside">
      <nav id="navigation" role="navigation">
        	<ul>
				<li><a href="index.html">Accueil</a></li>
				<li><a href="jeu.php">Jouer</a></li>
			</ul>
      </nav>
      
    </aside>
    <main id="main" role="main" class="flex-item-fluid pam">
	<div id="image"><img src="Images\NbCoups.png" alt="nombre de coups : 8" /></div>
<?php
/*lecture du fichier */
$fp = fopen ("motsInvariables.txt", "r"); /*Ouverture du fichier seulement en lecture*/
$contenu_du_fichier = fgets ($fp, 500); /*fichier pris en compte*/
fclose ($fp);/*Ferme le fichier*/


/*echo 'Notre fichier contient : '.$contenu_du_fichier;/*Afficher le contenu du fichier*/


$lesMots = explode(",", $contenu_du_fichier);


$nbAlea = rand (0 ,sizeof($lesMots)-1);/*Génère un nombre aléatoire de 0 aux nombres max de mots qu'il y a dans le fichier avec les mots invariables*/


$mot = $lesMots[$nbAlea];/*La variable mot est égale au mot lu dans le tableau $lesMots grâce au numéro aléatoire*/

$mot = strtoupper($mot);

$fp2 = fopen ("Definitions.txt", "r");
$contenu_du_fichier2 = fgets ($fp2, 1000);
fclose ($fp2);
$lesDefs = explode(":", $contenu_du_fichier2);
$def = $lesDefs[$nbAlea];

?>
    <div id="motCherche"><?php echo $mot; ?></div><br>

    Choisissez une lettre :<table id="tabLettre"><tr>

<?php
foreach (range('A', 'Z') as $lettre) {
    echo '<th id ='.$lettre.' onclick="jouer(this);">'.$lettre.'</th>';/*Tableau avec toutes les lettres*/
}
?>
</tr></table>
<input type ="submit" id="rej" name ="btn_clic" style="display:none" value = "REJOUER !" onclick="window.location.reload(false)"/>
<input type ="submit" id="ind" name ="btn_clic" value ="Indice" onclick="indice();"/>
<div id = "definition" style="visibility:hidden;"><?php echo $def;?></div>
  	</div> 
</body>
</html>

<!-- VUKELIC NICOLAS-->