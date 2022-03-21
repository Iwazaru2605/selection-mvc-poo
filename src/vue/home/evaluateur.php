<?php include_once("src/vue/partials/header.php") ?>
<?php include_once("src/vue/partials/navbar.php") ?>

<div class="ccontainer">
    <h1>Gestion des grilles</h1>

    <div class="grillesList">
        <?php foreach ($listGrilles as $grille) {?>
        <div>
            <i class="far fa-file" style="font-size: 75px; margin-bottom:25px; color: #<?php echo $randColors[array_rand($randColors, 1)] ?>;"></i>
            <h4>N°<?php echo $grille->get("numero_candidat") ?></h4>
            <h6><?php echo $grille->get("prenom") . " " . $grille->get("nom")?></h6>
            <a href="?evaluateur&editGrille&id=<?php echo $grille->get("id_grille"); ?>"><button class="btn">Modifier</button></a>
            <a href="?evaluateur&deleteGrille&id=<?php echo $grille->get("id_grille"); ?>"><button class="btn">Supprimer</button></a>
        </div>
        <?php } ?>
        <div style="align-self:center; padding: 55px 20px">
            <a href="?evaluateur&newGrille">
                <i class="far fa-file-plus" style="font-size: 75px; margin-bottom:25px; color: #<?php echo $randColors[array_rand($randColors, 1)] ?>;"></i>
                <h4>Créer nouvelle grille</h4>
            </a>
        </div>
    </div>
</div>



<style>
    .grillesList {
        display: flex;
        padding: 30px;
        flex-wrap: wrap;
        justify-content: center;
        
    }

    .grillesList>div {        
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 .25rem .375rem -.0625rem hsla(0, 0%, 8%, .12), 0 .125rem .25rem -.0625rem hsla(0, 0%, 8%, .07) !important;
        text-align: center;
        background: rgba(0,0,0,0.025);
        margin: 20px 10px;
    }

    .grillesList h6 {
        text-align: left;
    }

    .ccontainer button {
        background: #009473;
        color:white;
    }

    .ccontainer button:hover {
        background: #294841;
        color: white;
    }
</style>