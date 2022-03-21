<?php
require_once("src/model/GrillesManager.php");

Class Grille {
    // Liste des valeurs
    private $id_grille;
    private $numero_candidat;
    private $nom;
    private $prenom;
    private $type_bac;
    private $serieux;
    private $absence;
    private $attitude;
    private $etude;
    private $avis_pp;
    private $avis_proviseur;
    private $lettre;
    private $remarque;
    private $etat_dossier;
    private $note_finale;

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