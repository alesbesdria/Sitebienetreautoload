<?php

include ROOT . "/admin/_blocks/doctype.php";
?>

<body>
    <div class="logout-container">
        <form action="/admin/login/logout" method="POST">
            <button type="submit" class="btn-logout">Déconnexion</button>
        </form>
    </div>


    <div class="container">
        <h1 class="titre"><?= $title; ?></h1>
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
        <h2 class="titre"><?= $titlesecond; ?></h2>

        <?php

        require_once $view;

        ?>
        <script src="/admin/js/main.js"></script>
</body>

</html>