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
        var_dump($_SESSION);
        $title = "Gestion administrateur";
        $titlesecond = "Connexion";
        $view = ROOT . "/admin/Views/login.php";

        // if (isset($_SESSION['auth'])) {
        //     header("Location: /admin/user");
        // }

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->userModel->selectOne('*', 'user_mail = ?', [$_POST['user_mail']]);

            if ($user && password_verify($_POST['user_mdp'], $user->user_mdp)) {
                $_SESSION['auth'] = $user;
                header("Location: /admin/user");
            } else {
                $error = "Identifiants incorrects.";
            }
        }
        include ROOT . "/admin/Views/templatelogin.php";
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
