<?php include_once("src/vue/partials/header.php") ?>
<?php include_once("src/vue/partials/navbar.php") ?>

<div class="ccontainer">
    <h1>Nouveau compte</h1>

    <form id="formCreateUser" action="?admin&editUser&editedId=<?php echo $user->get("id_user"); ?>" method="post">
        <div>
            <label class="form-label">Nom d'utilisateur</label>
            <input required name="username" class="form-control" type="text" placeholder="Nom d'utilisateur" value="<?php echo $user->get("username") ?>"/>
        </div>
        <div>
            <label class="form-label">Mot de passe</label>
            <input required name="pwd" class="form-control" type="password" placeholder="Mot de passe" />
        </div>
        <div>
            <label class="form-label">Type de compte <br>Anciennement : <strong><?php echo $user->get("type") ?></strong> </label>
            <select name="account_type" class="form-select">
                <option value="admin">Administrateur</option>
                <option value="evaluateur">Évaluateur</option>
                <option value="secretaire">Secrétaire</option>
            </select>
        </div>

        <div style="text-align: center;">
            <button class="btn btn-primary" type="submit" style="margin-top: 14px;">Modifier le compte</button>
        </div>
    </form>
</div>

<style>
    #formCreateUser div {
        margin-bottom: 10px;
    }
</style>