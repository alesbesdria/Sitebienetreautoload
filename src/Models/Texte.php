<?php

namespace App\Models;

class Texte extends Crud
{
    protected $db_idtext;

    protected $db_titretext;

    protected $db_nametext;

    protected $db_contenttext;

    public function __construct()
    {
        parent::__construct();
        $this->table = "textes"; 
    }

    public function getTitre()
    {
        // var_dump($this->db_titretext);
        return $this->db_titretext;
    }

    public function getContenu()
    {
        // var_dump($this->db_contenttext);
        return $this->db_contenttext;
    }

    public function setTitre($titre)
    {
        $this->db_titretext = $titre;
    }

    public function setContenu($contenu)
    {
        $this->db_contenttext = $contenu;
    }

    public function findByTitle($title)
    {
        $result = $this->selectOne('*', 'text_names = :title', [':title' => $title]);

        if ($result) {
            $this->db_idtext = $result->id;
            $this->db_titretext = $result->text_titre;
            $this->db_nametext = $result->text_names;
            $this->db_contenttext = $result->text_content;
            return $this;
        }

        return null;
    }

    public function findById($id)
    {
        $result = $this->selectOne('*', 'id = :id', [':id' => $id]);

        if ($result) {
            // var_dump($result);
            $this->db_idtext = $result->id;
            $this->db_titretext = $result->text_titre;
            $this->db_nametext = $result->text_names;
            $this->db_contenttext = $result->text_content;
            return $this;
        }

        return null;
    }

}