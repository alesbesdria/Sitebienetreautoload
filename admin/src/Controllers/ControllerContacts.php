<?php

namespace Admin\Controllers;

use Admin\Models\Contacts;

class ControllerContacts
{
    private $modelcontact;

    public function __construct()
    {
        $this->modelcontact = new Contacts();
    }

    public function index()
    {

        $title = "Gestion administrateur";
        $titlesecond = "Liste des contacts";
        $contacts = $this->modelcontact->selectAll('*', "1 ORDER BY visitcontact_date ASC");
        $view = ROOT . "/admin/Views/listecontacts.php";
        include ROOT . "/admin/views/template.php";
    }
}
