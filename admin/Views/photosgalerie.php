<?php

use Admin\Controllers\ControllerGallery;

$galleryController = new ControllerGallery();
?>

<div class="picgallery-container">
    <!-- <h3>Galerie d'images</h3> -->
    <div class="mefGallery">
        <div class="ajout">
            <h3 class="newimg">Ajouter une nouvelle image</h3>
            <form class="fileprinc" action="" method="POST" enctype="multipart/form-data">
                <input class="mefinputgal" type="file" id="imageGallery" name="imageGallery">
                <button type="submit" name="addImageBtnGallery">Ajouter</button>
            </form>
        </div>

        <?php
        $galleryController->addImage();
        ?>

        <div class="gallery" id="gallery">
            <?php
            $galleryController->displayGallery();

            $galleryController->modifyImage();

            $galleryController->deleteImage();
            ?>
        </div>
    </div>
</div>