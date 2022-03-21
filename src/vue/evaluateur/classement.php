<?php include_once("src/vue/partials/header.php") ?>
<?php include_once("src/vue/partials/navbar.php") ?>

<div class="ccontainer">

    <h1>Classement des grilles</h1>
    <a href="?evaluateur&downloadCSV"><button class="btn btn-primary" style="margin-bottom: 20px; width: 300px;">Exporter le classement en CSV</button></a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>N° de candidat</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Note finale</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listGrilles as $k => $grille) { ?>
                <tr>
                    <td><?php echo $k +1 ?></td>
                    <td><?php echo $grille->get("numero_candidat") ?></td>
                    <td><?php echo $grille->get("nom") ?></td>
                    <td><?php echo $grille->get("prenom") ?></td>
                    <td><?php echo $grille->get("note_finale") ?>/20</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>