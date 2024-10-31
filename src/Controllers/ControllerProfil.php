<?php

namespace App\Controllers;

use App\Models\Picprofil;
use App\Models\Texte;

class ControllerProfil
{
    protected $picProfilModel;
    public $imageData;

    protected $modelTextValeur;
    public $textTitle;
    public $textContent;

    public function __construct()
    {
        $this->picProfilModel = new Picprofil();
        $this->modelTextValeur = new Texte();
    }

    public function index()
    {
        $this->showpic();
        $this->showtext();
        $view = ROOT . "/Views/valeurs.php";
        include ROOT . "/Views/template.php";
    }

    public function showpic()
    {
        $this->imageData = $this->picProfilModel->selectOne('*')->picprofil_photo;
    }

    public function showtext()
    {
        $textData = $this->modelTextValeur->findById(20);

        $this->textTitle = $textData->getTitre();
        $this->textContent = $textData->getContenu();
    }
}
