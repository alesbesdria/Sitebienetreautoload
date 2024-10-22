<?php

namespace Admin\Models;

class Visiteur extends Crud
{

    protected $db_idvisit;
    protected $db_lastnamevisit;
    protected $db_firstnamevisit;
    protected $db_mailvisit;
    protected $db_telvisit;
    protected $db_datevisit;

    // public function __construct(int $idvisit, string $lastnamevisit, string $firstnamevisit, string $mailvisit, string $telvisit, $datevisit)

    public function __construct($idvisit, $lastnamevisit, $firstnamevisit, $mailvisit, $telvisit, $datevisit)
    {
        $this->db_idvisit = $idvisit;
        $this->db_lastnamevisit = $lastnamevisit;
        $this->db_firstnamevisit = $firstnamevisit;
        $this->db_mailvisit = $mailvisit;
        $this->db_telvisit = $telvisit;
        $this->db_datevisit = $datevisit;
        parent::__construct();
        $this->table = "visit_contact";
    }
}
