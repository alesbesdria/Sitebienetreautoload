<?php

namespace Admin\Models;


class User extends Crud
{
    protected $id_user;
    protected $user_firstname;
    protected $user_lastname;
    protected $user_mail;
    protected $id_role;
    protected $user_mdp;
    protected $user_insert_date;

    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }
}
