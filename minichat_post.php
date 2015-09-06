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
	$url_variable = "index.php?qui_posteur=" . $_POST['posteur'] ;
	header("Location: $url_variable"); 

?>