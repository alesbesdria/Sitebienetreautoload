<?php

namespace Admin\Models;


class Logs{
    private $db;

    public function __construct($db) {
        $this->db = $db;  // Connexion à la base de données
    }

    // Fonction pour se connecter
    public function login($email, $password) {
        // Préparation de la requête SQL
        $stmt = $this->db->prepare('SELECT * FROM users NATURAL JOIN roles WHERE user_mail = ?');
        $stmt->execute([$email]);

        // Récupérer les informations de l'utilisateur
        $user = $stmt->fetch();

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['user_mdp'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['auth'] = $user;
            
            // Redirection vers la page d'accueil
            echo "<script language='javascript'> document.location.replace('./index.php'); </script>";
            return true;
        } else {
            // Si l'utilisateur n'existe pas ou si le mot de passe est incorrect
            return false;
        }
    }

    // Fonction pour vérifier si l'utilisateur est connecté
    public function isLogged() {
        return isset($_SESSION['auth']);
    }

    // Fonction pour déconnecter l'utilisateur
    public function logout() {
        unset($_SESSION['auth']);
        session_destroy();
    }

}