<?php

namespace Admin\Models;


class Contacts extends Crud
{

    protected $id;
    protected $visitlastname;
    protected $visitcontact_firstname;
    protected $visitcontact_mail;
    protected $visitcontact_date; //date a laquelle le formulaire a ete envoyé
    protected $visitcontact_tel;

    public function __construct()
    {
        parent::__construct();
        $this->table = "visit_contact";
    }

}
