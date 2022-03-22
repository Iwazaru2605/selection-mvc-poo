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
					array(
						"name" => "Classement",
						"action" => "?evaluateur&classement",
						"icon" => "far fa-list"
					),
				)
			),
		),
        // Compte secretaire
		"secretaire" => array(
			array(
				"name" => "Grilles",
				"id" => "users",
				"icon" => "fa fa-users",
				"list" => array(
					array(
						"name" => "Classement",
						"action" => "?evaluateur&classement",
						"icon" => "far fa-list"
					)
				)
			),
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
			"account" => NULL,
			"src" => "src/controller/evaluateurHandler.php",
		),
		"secretaire" => array(
			"name" => "evaluateur",
			"account" => "secretaire",
			"src" => "src/controller/secretaireHandler.php",
		),
	));

	// Définition barème pour les points
	define("POINTS", array(
		"type_bac" => array(
			"pro" => 8,
			"es" => 12,
			"l" => 9,
			"stmg" => 10,
			"autre" => 5,
		),
		"serieux" => array(
			"serieux-yes" => 1,
			"serieux-no" => -1
		),
		"absence" => array(
			"absence-yes" => -1,
			"absence-no" => 1
		),
		"attitude" => array(
			"attitude-yes" => 0,
			"attitude-no" => 1
		),
		"etude" => array(
			"etude-yes" => 1,
			"etude-no" => 0
		),
		"lettre" => array(
			"bien" => 2,
			"assez_bien" => 1,
			"insuffisant" => -1,
			"negatif" => -2,
		),
		"avis_pp" => array(
			"bien" => 2,
			"assez_bien" => 1,
			"insuffisant" => -1,
			"negatif" => -2,
		),
		"avis_proviseur" => array(
			"bien" => 2,
			"assez_bien" => 1,
			"insuffisant" => -1,
			"negatif" => -2,
		),
	));
?>
