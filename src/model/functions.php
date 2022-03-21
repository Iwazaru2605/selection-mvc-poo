<?php 
    // Connexion à la base de donnée
    function connectDB() {
        try {
            if (SQLMETHOD == "SQLITE") {
                $bdd = new PDO('sqlite:' . SQLITENAME . '.sqlite');
                $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } elseif (SQLMETHOD == "MYSQL") {
                $bdd = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASSWORD);
            } else {
                echo "Type de méthode SQL inconnu.";
            }
        }
        catch(Exception $e) { die('Erreur : '.$e->getMessage()); }

        return $bdd;
    }

    // Connexion de l'utilisateur
    function connect($list, $type) {
        foreach ($list as $key => $value) {
            if ($type["username"] == $value->get("username") and $type["pwd"] == $value->get("pwd")) {
                $found = true;
                $currentUser = $value;
                $pageName = PAGESNAMES[$value->get("type")];
                if (isset($_GET["login"])) {
                    $listUsers = $list;
                    $randColors = array("009473", "00b38a", "09d0a4", "3fe9c2", "8BF1DA");
                    include("src/controller/" . $value->get("type") . "Handler.php");
                    include("src/vue/home/" . $value->get("type") . ".php");
                }
            }
        }  
        
        return array(
            "found" => isset($found) ? $found : false,
            "currentUser" => isset($currentUser) ? $currentUser : false,
            "pageName" =>  isset($pageName) ? $pageName : "Portail",
        );
    }

    // Affichage sécurisé d'une page pour un utilisateur
    function display($currentUser, $account, $file, $name) {
        $checkAccount = ($account != "all") ? true : false;
        $pageName = $name;
        if (!$currentUser) {
            echo "Une erreur est survenue (Vous n'êtes pas connecté)";
            return;
        } else {
            $checkAccount = (is_null($account)) ? true : false;
            if (!$checkAccount) { $checkAccount = ($currentUser->get("type") == $account) ? true : false; }
        }

        if ($checkAccount) {
            if (file_exists($file)) {
                require_once($file);
            } else {
                echo "Une erreur est survenue (chemin introuvable)";
            }
        }
    }

    // Routage vers les controlleurs
    function routeController($currentUser) {
        if (!$currentUser) {
            return;
        } else {
            foreach (ROUTERS as $k => $v) {
                if(isset($_GET[$k])) {
                    display($currentUser, $v["account"], $v["src"], $v["name"]);
                }
            }
        }
    }

    // Libellé pour récuperer si une valeure $_GET est définie
    function isGet($val) {
        return isset($_GET[$val]);
    }

    // Libellé pour récuperer si une valeure $_POST est définie
    function isPost($val) {
        return isset($_POST[$val]);
    }
 ?>
