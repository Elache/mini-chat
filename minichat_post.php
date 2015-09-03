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
try
 {
	
	$bdd = new PDO('mysql:host=localhost;dbname=mini_chat','root','');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch (Exception $e)
 {
	 die('Erreur : ' . $e->getMessage());
 }

 
 // création d'une entrée dans la BDD

$req = $bdd->prepare('INSERT INTO messages (id,posteur,message,date_message) VALUES(\'\', :posteur, :message, now())');
$req->execute(array('posteur'=>$_POST['posteur'],'message'=>$_POST['message']));


// transmission dans l'url du nom du posteur saisi dans le formulaire
// retour index.php (formulaire et messages)
$posteur_pour_cookie = $_POST['posteur'];
$url_variable = "index.php?qui_posteur=" . $_POST['posteur'] ;

 header("Location: $url_variable"); 

?>

 
   </body>
</html>