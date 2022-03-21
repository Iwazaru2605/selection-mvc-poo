<?php
    class UsersManager {
        private $db;

        public function __construct(PDO $db) {
            $this->setDB($db);
        }
        
        // Ajout d'un utilisateur dans la base de donnée
        public function add(User $user) {
            $req = $this->db->prepare("INSERT INTO users(username, pwd, type) VALUES (:username, :pwd, :type)");
            $req->execute(array(
                ":username" => $user->get("username"),
                ":pwd" => $user->get("pwd"),
                ":type" => $user->get("type") ?: "evaluateur"
            ));
        }

        // Suppression d'un utilisateur dans la base de donnée
        public function delete(User $user) {
            $req = $this->db->prepare("DELETE FROM users WHERE id_user = ?");
            $req->execute(array(
                $user->get("id_user")
            ));
        }

        // Récupération d'un utilisateur dans la base de donnée
        public function get(User $user) {
            $req = $this->db->prepare("SELECT * FROM users WHERE id_user = ?");
            $req->execute(array(
                $user->get("id_user")
            ));

            while ($data = $req->fetch()) {
                $newUser = new User($data);
            }

            return $newUser;
        }

        // Récupération de la liste des utilisateurs présents dans la base de donnée
        public function getList() {
            $req = $this->db->query("SELECT * FROM users");

            while ($data = $req->fetch()) {
                $users[] = new User($data);
            }

            return $users;
        }

        // Modification d'un utilisateur dans la base de donnée
        public function update(User $user) {
            $req = $this->db->prepare("UPDATE users SET username = :username, pwd = :pwd, type = :type_account WHERE id_user = :id");
            $req->execute(array(
                ":username" => $user->get("username"),
                ":pwd" => $user->get("pwd"),
                ":type_account" => $user->get("type"),
                ":id" => $user->get("id_user")
            ));
        }

        // Setters
        public function setDB(PDO $db) {
            $this->db = $db;
        }
    }
?>
