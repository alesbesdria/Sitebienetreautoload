<div class="contourphoto">
    <div class="photocadre">
        <?php
        echo "<img class='photo'src='/admin/assets/imageprofil/photo_profil.jpg' alt='photo Stéphanie Chantome' id='photo''>";
        ?>
    </div>
    <div class="prenom" id="prenom">Stéphanie<br>Chantôme</div>
</div>
    <h1><?= htmlspecialchars($this->textTitle); ?></h1>
    <p><?= nl2br(htmlspecialchars($this->textContent)); ?></p>