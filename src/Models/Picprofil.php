<?php

namespace Admin\Models;

class Picprofil extends Crud
{
    protected $db_idpicprofil;
    protected $db_namepicprofil;
    protected $db_contentpicprofil;

    public function __construct()
    {
        parent::__construct();
        $this->table = "pics_profil";
    }
}