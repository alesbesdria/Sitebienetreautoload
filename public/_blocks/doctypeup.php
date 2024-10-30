<?php
// require($_SERVER["DOCUMENT_ROOT"] . "/src/Controllers/controlertext.php");
// require($_SERVER["DOCUMENT_ROOT"] . "/src/Controllers/controlergalerie.php");
// require($_SERVER["DOCUMENT_ROOT"] . "/src/Controllers/controlervisiteur.php");
use App\Controllers\ControllerText;
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formation bien être, entretien motivationnel. Se sentir bien en apprenant">
    <meta name="keywords" content="esprit zen, détente, formations, développement personnel.">

    <link rel="stylesheet" href="/public/css/style.css">

    <title>Stéphanie Chantôme-Formation Bien Être</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>


    <header>

        <div class="etp">
            <div class="etpcontent">

                <img class="imgetp" src="/public/assets/icone/ornement.png" alt="image ornementale du titre">

                <div class="etpname">
                    La Diction
                </div>
                <div class="clientname">
                    Stéphanie Chantôme
                </div>
            </div>
        </div>
        <nav class="navprinc">
            <nav class="mininav">
                <a href="text/show/20">Mes valeurs</a>
                <button id="mininav" class="text1">Formations</button>
                <a href="text/show/18">Ressources</a>
            </nav>

            <nav class="navcolor" id="navcolor">
                <div class="navcontent">
                    <a class="entretientitre" href="text/show/9">Entretien motivationnel</a>
                    <a class="grayscale" href="text/show/12">Formation de base</a>
                    <a class="grayscale" href="text/show/10">Formation approfondissement</a>
                    <a class="grayscale" href="text/show/11">Parcours complet</a>
                    <a class="grayscale" href="text/show/13">Supervision</a>
                </div>
                <div class="navcontent">
                    <a class="entretientitre" href="text/show/19">Séances individuelles</a>
                    <a class="grayscale" href="text/show/8">Prise de décision</a>
                    <a class="grayscale" href="text/show/6">Changement de comportement</a>
                </div>
                <div class="navcontent">
                    <a class="entretientitre" href="text/show/3">Ateliers spécifiques</a>
                </div>
            </nav>
        </nav>
        <nav class="navcolor" id="navcolors">
            <div class="navcontent">
                <a class="entretientitre" href="text/show/9">Entretien motivationnel</a>
                <a class="grayscale" href="text/show/12">Formation de base</a>
                <a class="grayscale" href="text/show/10">Formation approfondissement</a>
                <a class="grayscale" href="text/show/11">Parcours complet</a>
                <a class="grayscale" href="text/show/13">Supervision</a>
            </div>
            <div class="navcontent">
                <a class="entretientitre" href="text/show/19">Séances individuelles</a>
                <a class="grayscale" href="text/show/8">Prise de décision</a>
                <a class="grayscale" href="text/show/6">Changement de comportement</a>
            </div>
            <div class="navcontent">
                <a class="entretientitre" href="text/show/3">Ateliers spécifiques</a>
            </div>
        </nav>



        <div class="logoaccueil">
            <a class="logo" href="text/show/1"><img src="/public/assets/icone/feuilleoiseauorange.png" id="logoaccueuil"
                    alt="logo accueil"></a>
            <div class="logotext">
                <a href="text/show/1">
                    Accueil
                </a>
            </div>
        </div>

    </header>


    <main>

        <div class="maincontent">

            <div class="menubulles">
                <div class="bubulle">
                    <div class="bulle">
                        <img class="bubu1" src="/public/assets/icone/bulle1.png" alt="bulle">
                        <img class="bubu2" src="/public/assets/icone/bulle3.png" alt="bulle">
                        <div class="text">
                            <a href="text/show/20">
                                Mes valeurs
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bubulle">
                    <div class="bulle">
                        <img class="bubu1" src="/public/assets/icone/bulle1.png" alt="bulle">
                        <img class="bubu2" src="/public/assets/icone/bulle3.png" alt="bulle">
                        <div class="text">
                            <a class="text1" href="text/show/9">
                                Formations
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bubulle">

                    <div class="bulle">
                        <img class="bubu1" src="/public/assets/icone/bulle1.png" alt="bulle">
                        <img class="bubu2" src="/public/assets/icone/bulle3.png" alt="bulle">
                        <div class="text">
                            <a href="text/show/18">
                                Ressources
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <section class="maintext">
                <article class="textprinc">