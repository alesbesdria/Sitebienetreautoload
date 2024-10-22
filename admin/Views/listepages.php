<?php
$selectAllUsers = $request->prepare('SELECT * FROM users
NATURAL JOIN roles
');
$selectAllUsers->execute();

?>
            <br>
            <h1>Gestion administrateur</h1>
            <h2>Liste des utilisateurs</h2>
            <br>
            <div class="d-flex justify-content-between justify-content-between">
                <a class=" btn btn-primary" href="./insert_user.php">Nouvel utilisateur</a>

                <a class="btn btn-light" href="./logout.php">Se déconnecter</a>

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Role</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($sAU = $selectAllUsers->fetch(\PDO::FETCH_OBJ)) {

                    ?>
                        <tr>
                            <th scope="row"><?php echo $sAU->id_user; ?></th>
                            <td><?php echo $sAU->user_firstname; ?></td>
                            <td><?php echo $sAU->user_lastname; ?></td>
                            <td><?php echo strtoupper($sAU->role_name); ?></td>
                            <td><?php echo $sAU->user_insert_date; ?></td>

                            <td><a class="btn btn-primary" href="./user.php?id=<?php echo $sAU->id_user; ?>">Voir</a></td>
                            <?php
                            if ($_SESSION['auth']['role_level'] > 99) {
                            ?>

                                <td><a class="btn btn-danger" href="./delete.php?id=<?php echo $sAU->id_user; ?>">Supprimer</a></td>
                            <?php } ?>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


            




        </div>


    <script src="/admin/js/main.js"></script>
</body>

</html>







<!-- 
// /////////////////////////////////////////////////////////////////////////////////////////////////////
// /////////////////////////////////////////////////////////////////////////////////////////////////////
// /////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- // if (isset($_POST['addImageBtnGallery']) && isset($_FILES['imageGallery'])) {
// $insertPhotoGallery = $db->prepare("INSERT INTO pics_gallery(picgallery_name, picgallery_photo) VALUES (?, ?)");
// $insertPhotoGallery->execute(array($_FILES['imageGallery']['name'], file_get_contents($_FILES['imageGallery']['tmp_name'])));
// echo "Photo ajoutée avec succès.";
// }

// $selectPhotoGallery = $db->prepare("SELECT * FROM pics_gallery");
// $selectPhotoGallery->execute();
// $photos = $selectPhotoGallery->fetchAll(PDO::FETCH_ASSOC); -->

<!-- // if (isset($_POST['modifyImageGallery']) && isset($_FILES['imageGallery'])) {
// $id_picgallery = $_POST['id_picgallery'];

// if ($_FILES['imageGallery']) {
// $gallery_name = $_FILES['imageGallery']['name'];
// $gallery_photo = file_get_contents($_FILES['imageGallery']['tmp_name']);

// $modifyPhotoGallery = $db->prepare("UPDATE pics_gallery SET picgallery_name = ?, picgallery_photo = ? WHERE id_picgallery = ?");
// $modifyPhotoGallery->execute(array($gallery_name, $gallery_photo, $id_picgallery));

// echo "Photo mise à jour avec succès.";

// $selectPhotoGallery->execute();
// $photos = $selectPhotoGallery->fetchAll(PDO::FETCH_ASSOC);
// } else {
// echo "Erreur lors de l'upload de l'image.";
// }
// } -->

<!-- // foreach ($photos as $photo)  -->
<!-- { -->
<!-- // $imgLocation = 'data:image/jpeg;base64,' . base64_encode($photo['picgallery_photo']); -->
<!-- // echo '<img  -->
<!-- src="' . $imgLocation . '" width="150" height="auto">'; -->
<!-- // -->
<!-- ?> -->
<!-- //     <div class="mefPhoto">
                            //         <form action="" method="post" enctype="multipart/form-data">
                            //             <input type="hidden" name="id_picgallery" value="
                            <?
                            // php
                            // echo $photo['id_picgallery']; 
                            // 
                            ?>
                            // ">
                            //             <input type="file" id="imageGallery" name="imageGallery">
                            //             <button class="btn btn-primary" type="submit" name="modifyImageGallery" id="modifyImageGallery">Modifier</button>
                            //             <button class="btn btn-danger" type="submit" name="supprImageGallery" id="supprImageGallery">Supprimer</button>
                            //         </form>
                            //     </div> -->
<?
// php
// }
?>