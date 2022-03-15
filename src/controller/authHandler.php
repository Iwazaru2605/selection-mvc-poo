<?php
    // Controlleur de connexion
    session_start();
    $found = false;
    $isConnected = false;
    $failedAuth = false;

    require_once("src/model/functions.php");
    require_once("src/model/User.php");
    $db = connectDB();
    $userManager = new UsersManager($db);
    $listUsers = $userManager->getList();

    // Définition de $currentUser
    if (isset($_SESSION["username"]) and isset($_SESSION["pwd"]) and !$failedAuth) {
        $dataUser = connect($listUsers, $_SESSION);
        $found = $dataUser["found"];

        if ($found)  {
            $currentUser = $dataUser["currentUser"];
            $pageName = $dataUser["pageName"];
            $isConnected = true;  
        }
    } elseif (isset($_POST["username"]) and isset($_POST["pwd"]) and !$failedAuth) {
        $dataUser = connect($listUsers, $_POST);
        $found = $dataUser["found"];

        if ($found)  {
            $currentUser = $dataUser["currentUser"];
            $pageName = $dataUser["pageName"];
            $isConnected = true;  
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["pwd"] = $_POST["pwd"];       
        }
    }    

    // Si mot de passe / login est faux:
    if (!isset($found)) {
        $failedAuth = true;
        $pageName = "Portail d'authentification";
        include_once("src/vue/auth/authentication.php");
    }

    if((isset($_POST["username"]) and isset($_POST["pwd"])) or (isset($_SESSION["username"]) and isset($_SESSION["pwd"]))) {
        if (!$found) {
            $failedAuth = true;
            $pageName = "Portail d'authentification";
            include_once("src/vue/auth/authentication.php");
        }
    } else {
        $isConnected = false;
    }

    // Déconnexion
    if(isset($_GET["disconnect"])) {
        session_destroy();

        header("Location: index.php");
    }
?>