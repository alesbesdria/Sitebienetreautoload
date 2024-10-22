<?php
namespace Admin\Controllers;

use Admin\Models\Visits;

class ControllerVisit
{
    private $modelvisit;

    public function __construct()
    {
        $this->modelvisit = new Visits();
    }

    public function index()
    {

        $title = "Gestion administrateur";
        $titlesecond = "Liste visiteurs du site";
        $view = ROOT . "/admin/Views/listevisiteurs.php";
        include ROOT . "/admin/views/template.php";

    }

    
}