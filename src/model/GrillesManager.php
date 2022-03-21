<?php
    class GrillesManager {
        private $db;

        public function __construct(PDO $db) {
            $this->setDB($db);
        }
        
        // Ajout d'une grille dans la base de donnée
        public function add(Grille $grille) {
            $req = $this->db->prepare("INSERT INTO grille(numero_candidat, nom, prenom, type_bac, serieux, absence, attitude, etude, avis_pp, avis_proviseur, lettre, remarque, etat_dossier, note_finale )
            VALUES (:numero_candidat, :nom, :prenom, :type_bac, :serieux, :absence, :attitude, :etude, :avis_pp, :avis_proviseur, :lettre, :remarque, :etat_dossier, :note_finale)");
            $req->execute(array(
                ":numero_candidat" => $grille->get("numero_candidat"),
                ":nom" => $grille->get("nom"),
                ":prenom" => $grille->get("prenom"),
                ":type_bac" => $grille->get("type_bac"),
                ":serieux" => $grille->get("serieux"),
                ":absence" => $grille->get("absence"),
                ":attitude" => $grille->get("attitude"),
                ":etude" => $grille->get("etude"),
                ":avis_pp" => $grille->get("avis_pp"),
                ":avis_proviseur" => $grille->get("avis_proviseur"),
                ":lettre" => $grille->get("lettre"),
                ":remarque" => $grille->get("remarque"),
                ":etat_dossier" => $grille->get("etat_dossier"),
                ":note_finale" => $grille->get("note_finale"),
            ));
        }

        // Suppression d'une grille dans la base de donnée
        public function delete(Grille $grille) {
            $req = $this->db->prepare("DELETE FROM grille WHERE id_grille = ?");
            $req->execute(array(
                $grille->get("id_grille")
            ));
        }

        // Récupération d'une grille dans la base de donnée
        public function get(Grille $grille) {
            $req = $this->db->prepare("SELECT * FROM grille WHERE id_grille = ?");
            $req->execute(array(
                $grille->get("id_grille")
            ));

            while ($data = $req->fetch()) {
                $newGrille = new Grille($data);
            }

            return $newGrille;
        }

        // Récupération de la liste des grilles présents dans la base de donnée
        public function getList() {
            $req = $this->db->query("SELECT * FROM grille");

            while ($data = $req->fetch()) {
                $grilles[] = new Grille($data);
            }

            return $grilles;
        }

        // Récupération de la liste des grilles présents dans la base de donnée dans un classement
        public function getListOrdered() {
            $req = $this->db->query("SELECT * FROM grille WHERE etat_dossier = 'accepte' ORDER BY note_finale DESC");

            while ($data = $req->fetch()) {
                $grilles[] = new Grille($data);
            }

            return $grilles;
        }

        // Modification d'une grille dans la base de donnée
        public function update(Grille $grille) {
            $req = $this->db->prepare("UPDATE grille SET numero_candidat = :numero_candidat, nom = :nom, prenom = :prenom, type_bac = :type_bac, serieux = :serieux, absence = :absence, attitude = :attitude, etude = :etude, avis_pp = :avis_pp, avis_proviseur = :avis_proviseur, lettre = :lettre, remarque = :remarque, etat_dossier = :etat_dossier, note_finale = :note_finale WHERE id_grille = :id");

            $req->execute(array(
                ":numero_candidat" => $grille->get("numero_candidat"),
                ":nom" => $grille->get("nom"),
                ":prenom" => $grille->get("prenom"),
                ":type_bac" => $grille->get("type_bac"),
                ":serieux" => $grille->get("serieux"),
                ":absence" => $grille->get("absence"),
                ":attitude" => $grille->get("attitude"),
                ":etude" => $grille->get("etude"),
                ":avis_pp" => $grille->get("avis_pp"),
                ":avis_proviseur" => $grille->get("avis_proviseur"),
                ":lettre" => $grille->get("lettre"),
                ":remarque" => $grille->get("remarque"),
                ":etat_dossier" => $grille->get("etat_dossier"),
                ":note_finale" => $grille->get("note_finale"),
                ":id" => $grille->get("id_grille"),
            ));
        }

        // Setters
        public function setDB(PDO $db) {
            $this->db = $db;
        }
    }
?>
