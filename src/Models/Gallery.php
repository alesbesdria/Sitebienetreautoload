<?php

namespace Admin\Models;


class Gallery extends Crud
{

    protected $db_idgallery;
    protected $db_namegallery;

    public function __construct()
    {
        parent::__construct();
        $this->table = "pics_gallery";
    }
}
