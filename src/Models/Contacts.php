<?php

namespace App\Models;


class Contacts extends Crud
{

    protected $id;
    protected $visitcontact_lastname;
    protected $visitcontact_firstname;
    protected $visitcontact_mail;
    protected $visitcontact_date; 
    protected $visitcontact_tel;
    protected $visitcontact_sujet; 
    protected $visitcontact_message; 

    public function __construct()
    {
        parent::__construct();
        $this->table = "visit_contact";
    }

    public function create(array $data) {
        return $this->insert($data);
    }


}