<?php include_once("src/vue/partials/header.php") ?>

<div class="login-card">
    <h1 style="margin-bottom: 0px;">Selection</h1>
    <h6 style="color: var(--bs-gray);">Portail de connexion</h6>
    <form class="form-signin" action="index.php?login" method="post">
        <input class="form-control" type="text" id="inputEmail" required="" name="username" placeholder="Nom d'utilisateur" autofocus="">
        <input class="form-control" type="password" id="inputPassword" required="" name="pwd" placeholder="Mot de passe">
        <?php if ($failedAuth) { ?> <span style="color:red">Nom d'utilisateur ou mot de passe incorrect</span> <?php } ?>

        <button class="btn btn-primary btn-lg d-block btn-signin w-100" type="submit">Se connecter</button>
    </form>
</div>
