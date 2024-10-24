<?php

namespace App\Models;


class Contacts extends Crud
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

    public function create($data)
    {
        $columnNames = ['visitlastname', 'visitcontact_firstname', 'visitcontact_mail', 'visitcontact_tel', 'visitcontact_date', 'visitmessage'];
        return $this->insert($columnNames, [
            $data['visitlastname'],
            $data['visitcontact_firstname'],
            $data['visitcontact_mail'],
            $data['visitcontact_tel'],
            $data['visitcontact_date'],
            $data['visitmessage']
        ]);
    }
}
