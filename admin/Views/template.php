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
                <a href="admin/text/index/1">Gestion de contenu de pages</a>
            </li>
            <li>
                <a href="admin/profil/index/1">Changement de photo de profil</a>
            </li>
            <li>
                <a href="admin/gallery/index/1">Gestion de la galerie</a>
            </li>
            <li>
                <a href="admin/contacts/index/1">Liste des demandes de contact</a>
            </li>
            <li>
                <a href="admin/visiteurs/index/1">Liste des visiteurs</a>
            </li>
        </menu>
        <h2 class="titre"><?= $titlesecond; ?></h2>

        <?php

        require_once $view;

        ?>
        <script src="/admin/js/main.js"></script>
</body>

</html>