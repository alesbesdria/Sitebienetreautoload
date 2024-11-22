<?php

include ROOT . "/admin/_blocks/doctype.php";
?>

<body>


    <div class="container">

        <menu class="menuadmin">
            <li>
                <a href="text">Gestion de contenu de pages</a>
            </li>
            <li>
                <a href="profil">Changement de photo de profil</a>
            </li>
            <li>
                <a href="gallery">Gestion de la galerie</a>
            </li>
            <li>
                <a href="contacts">Liste des demandes de contact</a>
            </li>
            <li>
                <a href="user">Liste des utilisateurs</a>
            </li>
        </menu>
        <div class="logout-container">
            <form action="/admin/login/logout" method="POST">
                <button type="submit" class="btn-logout">
                    <img class="deco" src="/admin/assets/icone/deco.png" alt="bouton déconnexion">

                </button>
            </form>
        </div>
        <h1 class="titre"><?= $title; ?></h1>
        </div>

        <h2 class="titre slt"><?= $titlesecond; ?></h2>

        <?php
        require_once $view;
        ?>
</body>

</html>