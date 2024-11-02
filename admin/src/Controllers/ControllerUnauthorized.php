<?php

namespace Admin\Controllers;

class ControllerUnauthorized
{

    public function index()
    {

        $view = ROOT . "/admin/Views/unauthorized.php";
        include ROOT . "/admin/Views/templatelogin.php";
    }
}
