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
        // Extraire dynamiquement les colonnes et valeurs du tableau $data
        // $columns = array_keys($data);
        // $values = array_values($data);
    
        // // Appel de la méthode insert avec les colonnes et les valeurs
        // return $this->insert($columns, $values);
        return $this->insert($data);
    }

    // public function create($data) {
    //     $this->insert([
    //         'visitcontact_lastname', 'visitcontact_firstname', 'visitcontact_mail',
    //         'visitcontact_tel', 'visitcontact_date', 'visitcontact_sujet',
    //         'visitcontact_message'
    //     ], [
    //         $data['visitcontact_lastname'], $data['visitcontact_firstname'], 
    //         $data['visitcontact_mail'], $data['visitcontact_tel'], 
    //         $data['visitcontact_date'], $data['visitcontact_sujet'], 
    //         $data['visitcontact_message']
    //     ]);
    // }

    // public function create($data)
    // {
    //     $columnNames = ['visitlastname', 'visitcontact_firstname', 'visitcontact_mail', 'visitcontact_tel', 'visitcontact_date', 'visitcontact_sujet', 'visitcontact_message'];
    //     return $this->insert($columnNames, [
    //         $data['visitlastname'],
    //         $data['visitcontact_firstname'],
    //         $data['visitcontact_mail'],
    //         $data['visitcontact_tel'],
    //         $data['visitcontact_date'],
    //         $data['visitcontact_sujet'],
    //         $data['visitcontact_message']
    //     ]);
    // }
}