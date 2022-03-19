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
			// array(
			// 	"name" => "Matières",
			// 	"id" => "matieres&manageMatieres",
			// 	"icon" => "fa fa-books"
			// )	
		),
        // Compte évaluateur
		"evaluateur" => array(
			array(
				"name" => "Evaluations",
				"id" => "questionnaire",
				"icon" => "icon ion-ios-filing icon",
				"list" => array(
					array(
						"name" => "Gestion évaluations",
						"action" => "?questionnaires&manageQuestionnaires"
					),
					array(
						"name" => "Nouvelle évaluation",
						"action" => "?questionnaires&newQuestionnaire"
					),
				)
			),
			array(
				"name" => "Evaluations publiés",
				"id" => "questionnairePublished",
				"icon" => "icon ion-ios-world-outline icon",
				"list" => array(
					array(
						"name" => "Gestion questionnaires",
						"action" => "?questionnaires&manageQuestionnairesPublished"
					),
					array(
						"name" => "Actuellement publiées",
						"action" => "?questionnaires&manageQuestionnairesPublishedActually"
					),
					array(
						"name" => "Evaluation à corriger",
						"action" => "?questionnaires&manageQuestionnairesPublishedFinished"
					),
				)
			),
			array(
				"name" => "Matières",
				"id" => "matieres&manageMatieres",
				"icon" => "icon ion-ios-book icon"
			)	
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
		"questions" => array(
			"name" => "Questions",
			"account" => "teacher",
			"src" => "src/c/questionsHandler.php",
		),
		"questionnaires" => array(
			"name" => "Questionnaires",
			"account" => NULL,
			"src" => "src/c/questionnairesHandler.php",
		),
		"matieres" => array(
			"name" => "Matières",
			"account" => NULL,
			"src" => "src/c/matieresManager.php"
		),
	));
?>
