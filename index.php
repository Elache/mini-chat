<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Mini-chat</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body>

<!--	Ce mini-chat affiche un formulaire pour poster et les 5 derniers messages postés.
		Les messages sont enregistrés dans une base de données. 
		A partir du second post d'un utilisateur, le formulaire est pré-rempli avec ce pseudo
-->

   
 
 <?php
 
// Connexion à la base de données 
		//		traitement d'éventuelle exception / CATCH 
		//		affichage rapport d'erreur (ATTR_ERRMODE)
	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=mini_chat','root','');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e) 
	{
		die('Erreur : ' . $e->getMessage());
	}

	
// Verification si Nom du posteur passé par l'URL
		// oui = formulaire pré rempli avec pseudo
		// non = première connexion : formulaire->pseudo à renseigner
	if(isset($_GET['qui_posteur']))	
	{
		$retiens_posteur = strip_tags($_GET['qui_posteur']);
	} else
	{		
		$retiens_posteur = "Votre pseudo";
	}

 ?>

<!-- Formulaire - pseudo pré-rempli si déjà connu -->
	<form method="post" action="minichat_post.php">
		<P>Votre pseudo : <input type="text" name="posteur" value="<?php echo $retiens_posteur ; ?>"><br/>
		<P>Votre message : <input type="text" name="message" value="Message"><br/>
		<input type="submit" submit="Envoyer">
	</form>


	<?php

// Requête / BDD
	$reponse=$bdd->query('SELECT message,posteur,date_message FROM messages ORDER BY date_message DESC LIMIT 0,5');


// Affichage des 5 derniers posts. 
	while($donnees=$reponse->fetch())
	{
		// Suppression des tags HTML // Sécurité-XSS (+ lisibilité par rapport à htmlspecialchars)
			$posteur_html = htmlspecialchars(strip_tags($donnees['posteur']));
			$message_html = htmlspecialchars(strip_tags($donnees['message']));
	?>

	<!-- Présentation des 5 derniers posts TABLE -->
	<table border=1 bordercolor=navy>
		<TR><TD width=500><I>	
			<?php 	echo  $message_html ; 	?>
		</I></TD></TR>
		<TR><TD align=right bgcolor="#ffefd">(post&eacute; par <B>
			<?php 	echo $posteur_html ;		
			echo "</B>) <small> le ";
			$date_affichage = date_create($donnees['date_message']);
			echo date_format($date_affichage,'d/m/Y (H\hi)');
			echo "</small></td></TR></table></br>";

}	

// fermeture de la connexion BDD
	$reponse -> closeCursor();

?>
 
   </body>
</html>