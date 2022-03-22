<?php include_once("src/vue/partials/header.php") ?>
<?php include_once("src/vue/partials/navbar.php") ?>

<div class="ccontainer">
    <h1><?php echo $pageName ?></h1>

    <form id="formCreateGrille" action="?evaluateur&<?php echo $action ?>" method="post">
        <div class="center">
            <h3>Informations candidat</h3>
        </div>

        <div>
            <label class="form-label">Numéro de candidat</label>
            <input required name="numero_candidat" class="form-control" type="text" placeholder="Numéro de candidat" <?php if (isset($grille)) { ?> value="<?php echo $grille->get("numero_candidat"); ?>" <?php } ?>/>
        </div>
        <div class="double">
            <div>
                <label class="form-label">Nom</label>
                <input required name="nom" class="form-control" type="text" placeholder="Nom" <?php if (isset($grille)) { ?> value="<?php echo $grille->get("nom"); ?>" <?php } ?>/>
            </div>
            <div>
                <label class="form-label">Prénom</label>
                <input required name="prenom" class="form-control" type="text" placeholder="Prénom" <?php if (isset($grille)) { ?> value="<?php echo $grille->get("prenom"); ?>" <?php } ?>/>
            </div>
        </div>

        <div class="center">
            <h3>Informations dossier</h3>
        </div>

        <div>
            <label class="form-label">Baccalauréat du candidat</label>
            <select required class="form-select" name="type_bac">
                <option <?php if (isset($grille) && $grille->get("type_bac") == "pro") { ?> selected <?php } ?> value="pro">Série pro (8 points)</option>
                <option <?php if (isset($grille) && $grille->get("type_bac") == "es") { ?> selected <?php } ?> value="es" >Série S/ES (12 points)</option>
                <option <?php if (isset($grille) && $grille->get("type_bac") == "l") { ?> selected <?php } ?> value="l" >Série L (9 points)</option>
                <option <?php if (isset($grille) && $grille->get("type_bac") == "stmg") { ?> selected <?php } ?> value="stmg" > Série STMG (10 points)</option>
                <option <?php if (isset($grille) && $grille->get("type_bac") == "autre") { ?> selected <?php } ?> value="autre" >Autres (5 points)</option>
            </select>
        </div>
        <br>

        <div class="double">
            <div>
                <label for="serieux">Travail sérieux</label>
                <div class="form-check">
                    <input <?php if (isset($grille) && $grille->get("serieux") == "serieux-yes") { ?> checked <?php } ?> required name="serieux" id="serieux-yes" value="serieux-yes" class="form-check-input" type="radio" />
                    <label class="form-check-label" for="serieux-yes">Oui (+1 points)</label>
                </div>
                <div class="form-check">
                    <input <?php if (isset($grille) && $grille->get("serieux") == "serieux-no") { ?> checked <?php } ?>  required name="serieux" id="serieux-no" value="serieux-no" class="form-check-input" type="radio" />
                    <label class="form-check-label" for="serieux-no">Non (-1 points)</label>
                </div>
            </div>
            <div>
                <label for="absence">Absence</label>
                <div class="form-check">
                    <input <?php if (isset($grille) && $grille->get("absence") == "absence-yes") { ?> checked <?php } ?>  required name="absence" id="absence-yes" value="absence-yes" class="form-check-input" type="radio" />
                    <label class="form-check-label" for="absence-yes">Oui (-1 points ou dossier refusé)</label>
                </div>
                <div class="form-check">
                    <input <?php if (isset($grille) && $grille->get("absence") == "absence-no") { ?> checked <?php } ?>  required name="absence" id="absence-no" value="absence-no" class="form-check-input" type="radio" />
                    <label class="form-check-label" for="absence-no">Non (+1 points)</label>
                </div>
            </div>
        </div>

        <div class="double">
            <div>
                <label for="attitude">Attitude & comportement</label>
                <div class="form-check">
                    <input <?php if (isset($grille) && $grille->get("attitude") == "attitude-yes") { ?> checked <?php } ?>  required name="attitude" id="attitude-yes" value="attitude-yes" class="form-check-input" type="radio" />
                    <label class="form-check-label" for="attitude-yes">Oui (dossier refusé)</label>
                </div>
                <div class="form-check">
                    <input <?php if (isset($grille) && $grille->get("attitude") == "attitude-no") { ?> checked <?php } ?>  required name="attitude" id="attitude-no" value="attitude-no" class="form-check-input" type="radio" />
                    <label class="form-check-label" for="attitude-no">Non (+1 points)</label>
                </div>
            </div>
            <div>
                <label for="etude">Etude supérieure</label>
                <div class="form-check">
                    <input <?php if (isset($grille) && $grille->get("etude") == "etude-yes") { ?> checked <?php } ?>  required name="etude" id="etude-yes" value="etude-yes" class="form-check-input" type="radio" />
                    <label class="form-check-label" for="etude-yes">Oui (+1 points)</label>
                </div>
                <div class="form-check">
                    <input <?php if (isset($grille) && $grille->get("etude") == "etude-no") { ?> checked <?php } ?>  required name="etude" id="etude-no" value="etude-no" class="form-check-input" type="radio" />
                    <label class="form-check-label" for="etude-no">Non (+0 points)</label>
                </div>
            </div>
        </div>

        <div class="center">
            <h3>Avis</h3>
        </div>

        <div>
            <label class="form-label">Lettre de motivation</label>
            <select required class="form-select" name="lettre">
                <option <?php if (isset($grille) && $grille->get("lettre") == "bien") { ?> selected <?php } ?> value="bien" >Bien (+2)</option>
                <option <?php if (isset($grille) && $grille->get("lettre") == "assez_bien") { ?> selected <?php } ?> value="assez_bien">Assez bien (+1)</option>
                <option <?php if (isset($grille) && $grille->get("lettre") == "insuffisant") { ?> selected <?php } ?> value="insuffisant">Insuffisant (-1)</option>
                <option <?php if (isset($grille) && $grille->get("lettre") == "negatif") { ?> selected <?php } ?> value="negatif">Négatif (-2)</option>
            </select>
        </div>


        <div class="double">
            <div>
                <label class="form-label">Avis professeur principal</label>
                <select required class="form-select" name="avis_pp">
                    <option <?php if (isset($grille) && $grille->get("avis_pp") == "bien") { ?> selected <?php } ?> value="bien" >Bien (+2)</option>
                    <option <?php if (isset($grille) && $grille->get("avis_pp") == "assez_bien") { ?> selected <?php } ?> value="assez_bien">Assez bien (+1)</option>
                    <option <?php if (isset($grille) && $grille->get("avis_pp") == "insuffisant") { ?> selected <?php } ?> value="insuffisant">Insuffisant (-1)</option>
                    <option <?php if (isset($grille) && $grille->get("avis_pp") == "negatif") { ?> selected <?php } ?> value="negatif">Négatif (-2)</option>
                </select>
            </div>
            <div>
                <label class="form-label">Avis proviseur</label>
                <select required class="form-select" name="avis_proviseur">
                    <option <?php if (isset($grille) && $grille->get("avis_proviseur") == "bien") { ?> selected <?php } ?> value="bien" >Bien (+2)</option>
                    <option <?php if (isset($grille) && $grille->get("avis_proviseur") == "assez_bien") { ?> selected <?php } ?> value="assez_bien">Assez bien (+1)</option>
                    <option <?php if (isset($grille) && $grille->get("avis_proviseur") == "insuffisant") { ?> selected <?php } ?> value="insuffisant">Insuffisant (-1)</option>
                    <option <?php if (isset($grille) && $grille->get("avis_proviseur") == "negatif") { ?> selected <?php } ?> value="negatif">Négatif (-2)</option>
                </select>
            </div>
        </div>

        <div>
            <label class="form-label">Remarques</label>
            <textarea required name="remarque" class="form-control" placeholder="Remarques"><?php if (isset($grille)) { echo $grille->get("remarque"); } ?> </textarea>
        </div>

        <br>

        <div class="center">
            <h3>Etat du dossier</h3>
            <h6>La note finale sera calculée automatiquement lors de la sauvegarde de la grille d'évaluation.</h6>
        </div>

        <!-- <div>
            <label class="form-label">Note finale</label>
            <input <?php if (isset($grille)) { ?> value="<?php echo $grille->get("note_finale"); ?>" <?php } ?> required name="note_finale" class="form-control" type="number" min="0" max="20" placeholder="Note finale" />
        </div> -->

        <div>
            <label class="form-label">Etat du dossier</label>
            <select required class="form-select" name="etat_dossier">
                <option <?php if (isset($grille) && $grille->get("etat_dossier") == "accepte") { ?> selected <?php } ?> value="accepte" >Dossier accepté</option>
                <option <?php if (isset($grille) && $grille->get("etat_dossier") == "examiner") { ?> selected <?php } ?> value="examiner">Dossier à re-éxaminer</option>
                <option <?php if (isset($grille) && $grille->get("etat_dossier") == "refuse") { ?> selected <?php } ?> value="refuse">Dossier refusé</option>
            </select>
        </div>

        <div style="text-align: center;">
            <button class="btn btn-primary" type="submit" style="margin-top: 14px;">Sauvegarder</button>
        </div>
    </form>
</div>

<style>
    #formCreateGrille div {
        margin-bottom: 10px;
    }

    #formCreateGrille .center {
        text-align: center;
    }

    #formCreateGrille .double {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    #formCreateGrille .double div {
        width: 50%;
        margin-right: 20px
    }
</style>