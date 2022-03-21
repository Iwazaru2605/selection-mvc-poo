<?php
    // Controlleur action evaluateur
    require_once("src/model/functions.php");
    require_once("src/model/Grille.php");
    $db = connectDB();
    $grillesManager = new GrillesManager($db);

    // Actions
    if (isGet("login")) {
        // Page d'accueil
        $listGrilles = $grillesManager->getList();
    } elseif (isGet("createGrille")) {
        // Création de grille
        $data = array(
            "numero_candidat" => $_POST["numero_candidat"],
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "type_bac" => $_POST["type_bac"],
            "serieux" => $_POST["serieux"],
            "absence" => $_POST["absence"],
            "attitude" => $_POST["attitude"],
            "etude" => $_POST["etude"],
            "avis_pp" => $_POST["avis_pp"],
            "avis_proviseur" => $_POST["avis_proviseur"],
            "lettre" => $_POST["lettre"],
            "remarque" => $_POST["remarque"],
            "etat_dossier" => $_POST["etat_dossier"],
            "note_finale" => $_POST["note_finale"],
        );

        $grille = new Grille($data);
        $grillesManager->add($grille);

        header("Location: index.php?login");
    } elseif (isGet("editGrille") && isGet("idGrille")){
        // Modification de grille
        $rawGrille = new Grille(array("id_grille" => $_GET["idGrille"]));
        $grille = $grillesManager->get($rawGrille);

        $grille->set("numero_candidat", $_POST["numero_candidat"]);
        $grille->set("nom", $_POST["nom"]);
        $grille->set("prenom", $_POST["prenom"]);
        $grille->set("type_bac", $_POST["type_bac"]);
        $grille->set("serieux", $_POST["serieux"]);
        $grille->set("absence", $_POST["absence"]);
        $grille->set("attitude", $_POST["attitude"]);
        $grille->set("etude", $_POST["etude"]);
        $grille->set("avis_pp", $_POST["avis_pp"]);
        $grille->set("avis_proviseur", $_POST["avis_proviseur"]);
        $grille->set("lettre", $_POST["lettre"]);
        $grille->set("remarque", $_POST["remarque"]);
        $grille->set("etat_dossier", $_POST["etat_dossier"]);
        $grille->set("note_finale", $_POST["note_finale"]);

        $grillesManager->update($grille);
        header("Location: index.php?login");
    } elseif (isGet("deleteGrille") && isGet("id")) {
        // Suppresssion de grille
        $grille = new Grille(array("id_grille" => $_GET["id"]));
        $grillesManager->delete($grille);
        header("Location: index.php?login");
    } elseif (isGet("downloadCSV")) {
        $listGrilles = $grillesManager->getListOrdered();

        $delimiter = ";"; 
        $filename = "classement_" . date('Y-m-d') . ".csv"; 
        
        // Create a file pointer 
        $f = fopen('php://memory', 'w'); 
        
        // Set column headers 
        $fields = array("ID", "NUMERO_CANDIDAT", "NOM", "PRENOM", "TYPE_BAC", "SERIEUX", "ABSENCE", "ATTITUDE", "ETUDE", "AVIS_PP", "AVIS_PROVISEUR", "LETTRE_MOTIVATION", "REMARQUE", "ETAT_DOSSIER", "NOTE_FINALE"); 
        fputcsv($f, $fields, $delimiter); 
        
        // Output each row of the data, format line as csv and write to file pointer 
        foreach ($listGrilles as $grille) {
            $lineData = array(
                $grille->get("id_grille"),
                $grille->get("numero_candidat"),
                $grille->get("nom"),
                $grille->get("prenom"),
                $grille->get("type_bac"),
                $grille->get("serieux"),
                $grille->get("absence"),
                $grille->get("attitude"),
                $grille->get("etude"),
                $grille->get("avis_pp"),
                $grille->get("avis_proviseur"),
                $grille->get("lettre"),
                $grille->get("remarque"),
                $grille->get("etat_dossier"),
                $grille->get("note_finale")
            ); 
            fputcsv($f, $lineData, $delimiter); 
        } 
        
        // Move back to beginning of file 
        fseek($f, 0); 
        
        // Set headers to download file rather than displayed 
        header('Content-Type: text/csv'); 
        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
        
        //output all remaining data on a file pointer 
        fpassthru($f); 
        exit; 
    }

    // Vues
    if (isGet("newGrille")) {
        // Création de grilles
        $action = "createGrille";
        $pageName = "Nouvelle grille";

        include("src/vue/evaluateur/newGrille.php");
    } elseif (isGet("editGrille") && isGet("id")) {
        // Modification de grille
        $action = "editGrille&idGrille=" . $_GET["id"];
        $pageName = "Modification de grille";

        $rawGrille = new Grille(array("id_grille" => $_GET["id"]));
        $grille = $grillesManager->get($rawGrille);

        include("src/vue/evaluateur/newGrille.php");
    } elseif (isGet("classement")) {
        // Classement de grille
        $listGrilles = $grillesManager->getListOrdered();

        include("src/vue/evaluateur/classement.php");
    }
?>