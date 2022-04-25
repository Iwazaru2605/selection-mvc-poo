<?php include_once("src/vue/partials/header.php") ?>
<?php include_once("src/vue/partials/navbar.php") ?>

<div class="ccontainer">
    <h1>Gestion des utilisateurs</h1>

    <div class="usersList">
        <?php foreach ($listUsers as $user) {?>
        <div>
            <i class="far fa-user" style="font-size: 75px; margin-bottom:25px; color: #<?php echo $randColors[array_rand($randColors, 1)] ?>;"></i>
            <h4><?php echo $user->get("username") ?></h4>
            <h6><strong>Type : </strong><?php echo $user->get("type") ?></h6>
            <h6><strong>Nombre de connexions : </strong><?php echo $user->getTimeConnnected() ?></h6>
            <h6><strong>Dernière connexion : <br> </strong><?php echo $user->getLastConnection() ?></h6>
            <a href="?admin&editUser&id=<?php echo $user->get("id_user"); ?>"><button class="btn">Modifier</button></a>
            <a href="?admin&delete&id=<?php echo $user->get("id_user"); ?>"><button class="btn">Supprimer</button></a>
        </div>
        <?php } ?>
        <div style="align-self:center; padding: 55px 20px">
            <a href="?admin&newUser">
                <i class="far fa-user-plus" style="font-size: 75px; margin-bottom:25px; color: #<?php echo $randColors[array_rand($randColors, 1)] ?>;"></i>
                <h4>Nouvel utilisateur</h4>
            </a>
        </div>
    </div>
</div>



<style>
    .usersList {
        display: flex;
        padding: 30px;
        flex-wrap: wrap;
        justify-content: center;
        
    }

    .usersList>div {        
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 .25rem .375rem -.0625rem hsla(0, 0%, 8%, .12), 0 .125rem .25rem -.0625rem hsla(0, 0%, 8%, .07) !important;
        text-align: center;
        background: rgba(0,0,0,0.025);
        margin: 20px 10px;
        max-width: 300px;
    }

    .usersList h6 {
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