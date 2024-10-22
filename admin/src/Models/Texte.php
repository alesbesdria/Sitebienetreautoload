<?php

namespace Admin\Models;


class Texte extends Crud
{
    /**
     * L'ID du texte
     *
     * @var int
     */
    protected $db_idtext;

    /**
     * Le nom du texte
     *
     * @var string
     */
    protected $db_nametext;

    /**
     * Le contenu du texte
     *
     * @var string
     */
    protected $db_contenttext;

    /**
     * Constructeur du texte
     * 
     * @param int $idtext L'ID du texte
     */

    public function __construct()
    {
        parent::__construct();
        $this->table = "textes";
        // $this->db_idtext = $idtext;
        // $this->db_nametext = $nametext;
        // $this->db_contenttext = $contenttext;

    }

    // public function voirTexte()
    // {
    //     echo $this->db_contenttext;
    // }
}

// $texte1 = new Texte(1, 'premier texte', 'contenu du premier texte');
// var_dump($texte1);
