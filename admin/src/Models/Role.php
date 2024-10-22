<?php

namespace Admin\Models;


class Role extends Crud
{
    protected $id_role;     
    protected $role_name;   
    protected $role_level; 

    public function __construct()
    {
        parent::__construct();
        $this->table = "roles";
    }

}
