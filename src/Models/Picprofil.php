<?php

namespace App\Models;

class Picprofil extends Crud
{
    protected $id;
    protected $picprofil_name;
    protected $picprofil_photo;

    public function __construct()
    {
        parent::__construct();
        $this->table = "pics_profil";
    }
}