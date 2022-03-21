<?php
    // Controlleur action evaluateur
    require_once("src/model/functions.php");
    require_once("src/model/Grille.php");
    $db = connectDB();
    $grillesManager = new GrillesManager($db);

    // Vues
    if (isGet("login")) {
        // Classement de grille
        $listGrilles = $grillesManager->getListOrdered();

        include("src/vue/evaluateur/classement.php");        
    }
?>