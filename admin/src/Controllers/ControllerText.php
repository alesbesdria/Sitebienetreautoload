<?php


namespace Admin\Controllers;


use Admin\Models\Texte;


class ControllerText
{
    private $model;

    public function __construct()
    {
        $this->model = new Texte();
    }

    public function index()
    {
        $title = "Gestion administrateur";
        $titlesecond = "Gestion des pages";
        $titles = [
            "Page Accueil (l'index)",
            "Actualités",
            "Articles",
            "Ateliers spécifiques",
            "Biblio",
            "CGV",
            "Changement",
            "Contact",
            "Décision",
            "Entretien motivationnel",
            "Formation approfondissement",
            "Formation parcours complet",
            "Formation de base : sens?",
            "Formation supervision",
            "Mentions",
            "Parcours",
            "Politique de confidentialités",
            "Ressources",
            "Séances individuelles",
            "Valeurs"
        ];

        list($contents, $messages, $updatedId) = $this->updatetext();

        $view = ROOT . "/admin/Views/home.php";
        require_once ROOT . "/admin/Views/template.php";
    }

    public function updatetext()
    {
        $contents = $this->model->selectAll('*');
        $messages = [];
        $updatedId = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $newdata) {
                if (strpos($key, 'text_') === 0) {
                    $id = str_replace('text_', '', $key);
                    $success = $this->model->update('text_content', $newdata, 'id', $id);

                    if ($success) {
                        $messages[$id] = 'Le texte a bien été modifié.';
                        $updatedId = $id;
                    } else {
                        $messages[$id] = 'La modification n\'a pas pu être effectuée.';
                    }
                }
            }
        }

        return [$contents, $messages, $updatedId];
    }
}
