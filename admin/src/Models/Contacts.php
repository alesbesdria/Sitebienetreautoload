<?php

namespace Admin\Models;


class Contacts extends Crud
{

    protected $id;
    protected $visitcontact_lastname;
    protected $visitcontact_firstname;
    protected $visitcontact_mail;
    protected $visitcontact_tel;
    protected $visitcontact_date; 

    public function __construct()
    {
        parent::__construct();
        $this->table = "visit_contact";
    }

}
