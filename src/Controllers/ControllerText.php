<?php

namespace App\Controllers;

use App\Models\Texte;

class ControllerText
{
    private $model;

    public function __construct()
    {
        $this->model = new Texte();
    }

    public function index()
    {
        $view = ROOT . "/Views/publiccontent.php";
        require_once ROOT . "/Views/template.php";
    }

    public function show($page = 0)
    {
        if (is_numeric($page)) {
            if ($page == 0) {
                $texte = $this->model->findById(1);
            } else
                $texte = $this->model->findById($page);
        } else {
            $texte = $this->model->findByTitle($page);
        }
        if ($texte) {
            $titre = $texte->getTitre();
            $contenu = $texte->getContenu();
            $view = ROOT . "/Views/publiccontent.php";
            require_once ROOT . "/Views/template.php";
        } else {
            echo "Texte non trouvé.";
        }
    }

























    /**
     * Optionnel : Méthode pour récupérer des données de texte en dur
     * (peut être utilisée si vous ne travaillez pas directement avec la base de données).
     */
    // public function getTexteData()
    // {
    //     $titles = [
    //         "Page Accueil (l'index)",
    //         "Articles",
    //         "Ateliers spécifiques",
    //         "Biblio",
    //         "CGV",
    //         "Changement",
    //         "Contact",
    //         "Décision",
    //         "Entretien motivationnel",
    //         "Formation approfondissement",
    //         "Formation parcours complet",
    //         "Formation de base : sens?",
    //         "Formation supervision",
    //         "Actualités",
    //         "Mentions",
    //         "Parcours",
    //         "Politique de confidentialités",
    //         "Ressources",
    //         "Séances individuelles",
    //         "Valeurs"
    //     ];

    //     $data = [];
    //     foreach ($titles as $title) {
    //         $texte = new Texte();
    //         $texte->setTitre($title);
    //         $texte->setContenu("Contenu du texte pour " . $title);

    //         $data[] = [
    //             'titre' => $texte->getTitre(),
    //             'contenu' => $texte->getContenu()
    //         ];
    //     }

    //     return $data;
    // }
}
