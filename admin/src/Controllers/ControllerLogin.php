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

    public function loginForm()
    {
        include($_SERVER["DOCUMENT_ROOT"] . "/Views/login.php");
    }

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

    public function logout()
    {
        session_start(); 
        unset($_SESSION['auth']); 
        session_destroy(); 
        header("Location: /admin/login"); 
        exit(); 

    }
}
