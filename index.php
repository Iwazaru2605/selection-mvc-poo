
<?php
    require_once("config/config.php");
    require_once("src/controller/authHandler.php");  // Vérification de l'utilisateur actuellement connecté
    if ($isConnected) {
        routeController($currentUser);
    } else {
        $pageName = "Portail d'authentification";
        include_once("src/vue/auth/authentication.php");
    }
?>

<?php include_once("src/vue/partials/footer.php") ?>