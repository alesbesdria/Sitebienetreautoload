<?php

namespace Admin\Models;


class Visits extends Crud
{

    protected $id;
    protected $visitlastname;
    protected $visitcontact_firstname;
    protected $visitcontact_mail;
    protected $visitcontact_date;
    protected $visitcontact_tel;

    public function __construct()
    {
        parent::__construct();
        $this->table = "visit_contact";
    }

}
