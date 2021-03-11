<?php

if (isset($_POST['nom']) && isset($_POST['prenom'])){
	
	echo '<h1>voici le récapitulatif de votre avis : </h1>';
	echo 'Prénom  Nom : '.$_POST['prenom']. " ". $_POST['nom'];
	
}
else{
	//header('Location: contact.php');	//redirection automatique vers la page contact
	echo "<a href='avis.php'>MERCI de saisir tous les champs du formulaire d'avis...</a>";
}
?>