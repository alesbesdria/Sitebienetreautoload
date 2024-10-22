<?php

$message = isset($message) ? $message : null;
?>



<div class="picprofil-container">

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="imageProfil" id="imageProfil">
        <button type="submit" name="addImageBtn" id="addImageBtn">Changer photo de profil</button>
    </form>

    <div id="photoprofil">
        <?php
        $folderProfil = '/admin/assets/imageprofil/';
        $imageName = 'photo_profil.jpg';
        $imgLocation = $folderProfil . $imageName;

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imgLocation)) {
            echo '<img src="' . $imgLocation . '" alt="Photo de profil" width="150" height="auto">';
        } else {
            echo "Aucune photo téléchargée !";
        }

        if (isset($message)) {
            echo "<p>$message</p>";
        }
        ?>
    </div>

</div>