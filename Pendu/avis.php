<html lang='fr'>
	<head>
	<title> jeu du PENDU ! Version2 : PHP - fichiers -  données externes </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="keywords" lang="fr" content="BTS,SIO,informatique,etude, technicien" />
	<meta name="description" content="Jeu du pendu en BTS Services Informatiques aux Organisations (S.I.O)." />

	<!-- lien vers les styles en CSS -->
	<link rel='stylesheet' type='text/css' href='Style/knacss.css'/>
	<link rel='stylesheet' type='text/css' href='Style/styles.css'/>

	<!-- lien vers les scripts JAVASCRIPT -->
	<script type='text/javascript' src='Script/analyseJeu.js'></script>

</head>
<body>
	<header id="header" role="banner" class="pam">
    BTS S.I.O (Services Informatiques aux Organisations)
  </header>
<div class="flex-container">
    <aside class="mod w20 pam aside">
      <nav id="navigation" role="navigation">
        	<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="jeu.php">Jouer</a></li>
				<li><a href="avis.php">Donner votre avis</a></li>
			</ul>
      </nav>
      
    </aside>
    <main id="main" role="main" class="flex-item-fluid pam">
	
	<section>
			<h1> Merci de laisser votre avis sur ce jeu </h1>
	<article>
		<?php
		//récupération d'infos sur la date du jour dans des variables grâce à la fonction php : date

		$jour = date("d");
		$mois = date("m");
		$annee = date("y");

		?>

		<form action="tt_avis.php" method="POST">
			<fieldset>
		<legend>Vos informations personnelles</legend><br/>
		<table>

			<tr>
		 	<td>Date de l'avis</td>
		 	<td><input type="text" name="DateAvis" id="DateAvis" value="<?php echo"$jour/$mois/$annee";?>" disabled="true"></td>
		 	</tr>
		 	<thead>
        	<tr>
            <th colspan="2">Vos informations personnelles</th>

		Nom : <input type="text" name="nom" id="nom" size="40" maxlength="50" autofocus required="required"><br/>
		Prénom : <input type="text" name="prenom" id="prenom" size="40" maxlength="50" required="required"><br/>
		Email : <input type="email" name="mail" required placeholder="xxxx@xxxx.xx"><br/>
		Situation : <select name="listeSituation" id="listeSituation" size="1">
						<option value="1" selected="selected">étudiant</option>
					</select><br/>
		Sexe : <input type="radio" name="sexe" value="F" id="F">
		<label for="F">Femme</label>
			</fieldset>	
	
			<fieldset>
		<legend>votre note sur ce jeu (0 à 5) et votre avis</legend>
		<input type="radio" name="note" value="0" id="note0">
				<label for="note0">0</label>
				<input type="radio" name="note" value="1" id="note1" >
				<label for="note1">1</label>
		<br/>
		avis : <textarea name="avis" id="avis" rows="4" cols="40" required="required"></textarea></br>
			</fieldset>
		<input type="submit" value="Valider">	<input type="reset" value="Annuler">
		</table>
	</form>
		</article>				
	</section>

    </main> 
  </div>
</body>
</html>