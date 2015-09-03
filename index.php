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

 
if(isset($_GET['qui_posteur']))
	{
		$retiens_posteur = strip_tags($_GET['qui_posteur']);
	} else
	{		
		$retiens_posteur = "Votre pseudo";
	}

 
 ?>

<!-- Formulaire -->
<form method="post" action="minichat_post.php">
	<P>Votre pseudo : <input type="text" name="posteur" value="<?php echo $retiens_posteur ; ?>"><br/>
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
?>

<table border=1 rules=rows>
	<TR>
		<TD bgcolor=#efefef colspan=4 align=center>Messages pr&eacute;c&eacute;dents</TD>
	</TR>
	<TR>
		<TD width=60 align=center><a href=javascript:void(0)>6 - 10</A></TD>
		<TD width=60 align=center><a href=javascript:void(0)>11 - 15</A></TD>
		<TD width=60 align=center><a href=javascript:void(0)>16 - 20</A></TD>
		<TD width=120 align=center><a href=javascript:void(0)>21 et suivants</A></TD>
	</TR>
</table>
<!-- sql : LIMIT 5-5 10-5 15-5 20-reste -->

<?php
$reponse -> closeCursor();

?>

   
   </body>
</html>






	