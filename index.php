<?php

setcookie('cookie_chat','Nom du posteur',time()+3600,null,null,false,true);
	// cookie, stockée 1 heure, httpOnly activé pour sécurité

// ATTENTION : stockage fonction du formulaire à implémenter	


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>     </title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
   <body>
 
 
 <?php
 
// Connexion à la base de données 
	//		traitement d'éventuelle exception / CATCH 
	//		affichage rapport d'erreur (ATTR_ERRMODE)
 try {
	$bdd = new PDO('mysql:host=localhost;dbname=mini_chat','root','');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch (Exception $e) {
	 die('Erreur : ' . $e->getMessage());
 }

 
 
 ?>

<!-- Formulaire -->
<form method="post" action="minichat_post.php">
	<P>Votre pseudo : <input type="text" name="posteur" value="<?php echo $_COOKIE['cookie_chat'] ; ?>"><br/>
	<P>Votre message : <input type="text" name="message" value="Message"><br/>
	<input type="submit" submit="Envoyer">
	<!-- // récupération du nom du posteur à implémenter (sur cookie) et en value pour posteur -->
</form>

<?php

$reponse=$bdd->query('SELECT message,posteur,date_message FROM messages ORDER BY date_message DESC LIMIT 0,5');

while($donnees=$reponse->fetch())
{
	// Suppression des tags HTML // Sécurité-XSS
	$posteur_html = strip_tags($donnees['posteur']);
	$message_html = strip_tags($donnees['message']);
	?>

	<table border=1 bordercolor=navy>
	<TR><TD width=500><I>	
		<?php	
		echo  $message_html ;
		?>
	</I></TD></TR>
	<TR><TD align=right bgcolor="#ffefd">(post&eacute; par <B>
		<?php
		echo $posteur_html ;
		?>
	</B>) <small> le 
	<?php 
		$date_affichage = date_create($donnees['date_message']);
		echo date_format($date_affichage,'d/m/Y (H\hi)');
	?>
	</small>
	</td></TR>
	</table>
	</br>

<?php
}	

/*
echo  '<P>Messages précédents <a href=>page 2</A> ; <a href=>page 3</A> ; <a href=>page 4</A> ; <a href=>page 5</A></P>';
5-5 10-5 15-5 21et+
*/

$reponse -> closeCursor();

?>

   
   </body>
</html>






	