<?php

namespace App\Controllers;

use App\Models\Gallery;

class ControllerGallery
{
    public function index()
    {
        $view = ROOT . "/Views/carousel.php";
        require_once ROOT . "/Views/template.php";
    }
}
