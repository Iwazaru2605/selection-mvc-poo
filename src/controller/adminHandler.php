<?php 
    // Controlleur action administrateur
    require_once("src/model/functions.php");
    $db = connectDB();
    $userManager = new UsersManager($db);

    // Actions
    if (isGet("delete") && isGet("id")) {
        // Suppression de compte
        $user = new User(array("id_user" => $_GET["id"]));
        $userManager->delete($user);
        
        header("Location: ?login");
    } elseif (isGet("createUser")) {
        // Création de compte
        $data = array(
            "username" => $_POST["username"],
            "pwd" => $_POST["pwd"],
            "type" => $_POST["account_type"],
        );

        $user = new User($data);
        $userManager->add($user);

        header("Location: ?login");
    } elseif (isGet("editUser") && isGet("editedId")) {
        // Modification de compte
        $user = new User(array("id_user" => $_GET["editedId"]));
        $user = $userManager->get($user);

        $user->set("username", $_POST["username"]);
        $user->set("pwd", $_POST["pwd"]);
        $user->set("type", $_POST["account_type"]);

        $userManager->update($user);
        header("Location: ?login");
    }

    // Vues
    if (isGet("newUser")) {
        // Création de compte
        include("src/vue/admin/newUser.php");
    } elseif (isGet("editUser") && isGet("id")) {
        // Modification de compte
        $user = new User(array("id_user" => $_GET["id"]));
        $user = $userManager->get($user);

        include("src/vue/admin/editUser.php");
    }
?>