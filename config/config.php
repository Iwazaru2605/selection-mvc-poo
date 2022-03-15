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

    // Définitions des routes vers les controllers
	define('ROUTERS', array(
		"admin" => array(
			"name" => "Administrateur",
			"account" => "admin",
			"src" => "src/c/adminHandler.php",
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
