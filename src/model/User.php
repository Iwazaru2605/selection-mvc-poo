<?php
require_once("src/model/UsersManager.php");

Class User {
    // Liste des valeurs
    private $id_user;
    private $username;
    private $pwd;
    private $id_type;

    // Construct à partir d'un tableau de valeur
    public function __construct($data) {
        $this->hydrate($data);
    }

    // Hydratation des données
    public function hydrate($data) {   
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
    }

    // Setter
    public function set($key, $value) {
        $this->$key = $value;
    }

    // Getter
    public function get($key) {
        return $this->$key;
    }    
}

?>