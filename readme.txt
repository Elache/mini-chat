﻿Projet de Mini-chat (Tchat)

Formulaire (pseudo / message) ; affichage des 5 derniers messages (MySQL)


--------------------	
Utilisé pour :
- Cours de M. Nebra, PHP/MySQL, OpenClassRooms
- Cours de M. G. Gauthier, GIT/GITHUB


--------------------	
Commit 1 : Fonctionnalités au 2 septembre 2015 :
		-- Formulaire (index.php) 
		--> INSERT bdd (minichat_post.php / redirection index.php)
		--> Affiche 5 derniers messages postés (index.php)
	ToDoList : 
		(1)--> PHP - Retenir Pseudo / Cookie --> Pré-remplir formulaire
		(2)--> PHP - Messages antérieurs / Pagination 
		(3)--> Finaliser commentaires (général + code)
		(4)--> Toilettage base de données (essais)

Commit 2 : Fonctionnalités ajoutées le 3 septembre
		-- Formulaire pré-rempli à partir de la valeur du Cookie (mais codée en dur)
	ToDoList : 	
		(1) Récupérer "pseudo saisi" sur le formulaire -->  Valeur du Cookie
		(2), (3), (4) à réaliser
		
Commit 3 : Essai Pseudo/Cookie : Version buggée
		-- mise à jour minichat.txt
		-- Ajout export MySQL (base vide)
		-- sur (1) : essai pour [pseudo --> cookie --> formulaire pré-rempli] Pb !!
	ToDoList : 	
		(1) : non fonctionnel, à débugger
		(2), (3), (4) à réaliser
		
		
Commit 4 : Programme fonctionnel / A compléter
		-- Pré-remplissage posteur sur formulaire après 1er message - Sans cookie
		-- mise à jour minichat.txt
	ToDoList : 	
		(2) à réaliser
	+	(5) rafraîchir la page des posts périodiquement (nouveaux visibles)
		(3), (4) à réaliser
	Pour aller plus loin : fonctionnement avec cookie

Commit 5 : minichat.txt renommé en Readme.txt - pas de changement PHP
Remarque : conditions du Repository sur GitHub réunies (>=4 commits) pour TP Github (cours M.G Gauthier) --> envoi à la correction
		
Commit 6 : toilettage du code (HTML / minichat_post.php)


--------------------	
Environnement / Développement
WAMP 2.5 : 
	PHP 5.5.12
	MySQL 5.6.17
	PHPMyAdmin 4.1.14
	Apache 2.4.9

		
		
		
		
		
		
		-
