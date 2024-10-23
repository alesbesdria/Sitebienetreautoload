<?php

namespace Admin\Controllers;

use Admin\Models\User;

class ControllerLogin
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $title = "Gestion administrateur";
        $titlesecond = "Connexion";
        $view = ROOT . "/admin/Views/login.php";

        include ROOT . "/admin/Views/templatelogin.php";
    }

    // Affiche le formulaire de connexion
    public function loginForm()
    {
        include($_SERVER["DOCUMENT_ROOT"] . "/Views/login.php");
    }

    // Gère l'authentification de l'utilisateur
    public function login($tablog)
    {
        session_start();

        $user = $this->userModel->selectOne('*', 'user_mail = ?', [$tablog['user_mail']]);

        if ($user && password_verify($tablog['user_mdp'], $user->user_mdp)) {
            $_SESSION['auth'] = $user;
            header("Location: /admin/user");
        } else {
            $error = "Identifiants incorrects.";
            include ROOT . "admin/Views/login.php";
        }
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        session_start(); // Démarrer la session pour gérer la déconnexion
        unset($_SESSION['auth']); // Supprimez les données de session
        session_destroy(); // Détruire la session
        header("Location: /admin/login"); // Rediriger vers la page de connexion
        exit(); // Sortir après la redirection

    }
}
