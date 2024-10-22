<?php

// class controlertext{
//     public function{
//         $model = new Model();
//         nos methode :
//         $articles = $model->find();...
//         require le template
//     }
// } ?????
//   button:subm
// ....

// nom fichier = nom classe!

//  c'et dans index qu'on met ce quil y a en dessous :


namespace Admin\Controllers;

// require_once 'vendor/autoload.php';

use Admin\Models\Logs;

class ControllerLogin
{

    private $model;

    public function __construct()
    {
        $this->model = new Logs();
    }

    public function index($id)
    {
        $title = "Gestion administrateur";
        $titlesecond = "Connexion";
        $view = ROOT . "/admin/Views/login.php";
        require_once ROOT . "/admin/Views/templatelogin.php";
    }

}
