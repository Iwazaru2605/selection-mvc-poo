<?php
	// Méthode de connexion SQL
	define('SQLMETHOD', "MYSQL"); // Méthode MySQL

	define("DBHOST", "localhost");
	define("DBNAME", "selection");
	define("DBUSER", "20ettouil");
	define("DBPASSWORD", "student");

    // Définition nom des pages d'accueils
	define('PAGESNAMES', array(
		"evaluateur" => "Espace évaluateur",
		"secretaire" => "Espace secrétaire",
		"admin" => "Espace administrateur"
	));

	// Elemetents de la Navbar
	define("MENUS", array(
        // Compte admin
		"admin" => array(
			array(
				"name" => "Utilisateurs",
				"id" => "users",
				"icon" => "fa fa-users",
				"list" => array(
					array(
						"name" => "Gestion utilisateurs",
						"action" => "?login",
						"icon" => "fa fa-users"
					),
					array(
						"name" => "Nouvel utilisateur",
						"action" => "?admin&newUser",
						"icon" => "fa fa-user-plus"
					),
				)
			),
		),
        // Compte évaluateur
		"evaluateur" => array(
			array(
				"name" => "Grilles",
				"id" => "users",
				"icon" => "fa fa-users",
				"list" => array(
					array(
						"name" => "Gestion grilles",
						"action" => "?login&evaluateur",
						"icon" => "far fa-file"
					),
					array(
						"name" => "Nouvelle grille",
						"action" => "?evaluateur&newGrille",
						"icon" => "far fa-file-plus"
					),
				)
			),
		),
        // Compte secretaire
		"secretaire" => array(
			array(
				"name" => "Liste des évaluations",
				"id" => "evaluations",
				"icon" => "icon ion-ios-filing icon",
				"list" => array(
					array(
						"name" => "Toutes les évaluations",
						"action" => "?questionnaires&allQuestionnaires"
					),
					array(
						"name" => "Evaluations à faire",
						"action" => "?questionnaires&todoQuestionnaires"
					),
					array(
						"name" => "Evaluations effectuées",
						"action" => "?questionnaires&didQuestionnaires"
					),
				)
			),
			array(
				"name" => "Résultats",
				"id" => "results",
				"icon" => "icon ion-ios-filing icon"
			)	
		)
	));


    // Définitions des routes vers les controllers
	define('ROUTERS', array(
		"admin" => array(
			"name" => "Administrateur",
			"account" => "admin",
			"src" => "src/controller/adminHandler.php",
		),
		"evaluateur" => array(
			"name" => "evaluateur",
			"account" => "evaluateur",
			"src" => "src/controller/evaluateurHandler.php",
		),
	));
?>
