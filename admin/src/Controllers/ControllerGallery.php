<?php

namespace Admin\Controllers;

use Admin\Models\Gallery;

class ControllerGallery
{
    protected $picsGalleryModel;
    private $folderGallery;
    protected $extensions = ['jpeg', 'jpg', 'png'];
    public function __construct()
    {
        $this->folderGallery = $_SERVER["DOCUMENT_ROOT"] . "/admin/assets/imagesgalerie/";
        $this->picsGalleryModel = new Gallery();
    }

    public function index()
    {
        $title = "Gestion administrateur";
        $titlesecond = "Gestion de photos de galerie";
        $view = ROOT . "/admin/Views/photosgalerie.php";
        include ROOT . "/admin/views/template.php";
    }

    public function displayGallery()
    {
        $photosGallery = scandir($this->folderGallery);
        // scandir liste les fichiers (et dossier) et retourne les élèments dans un tableau
        if ($photosGallery != 0) {
            foreach ($photosGallery as $photoGallery) {
                if ($photoGallery === '.' || $photoGallery === '..') {
                    continue;
                }
                // permet d'enlever les elements . et .. 

                $photoIdSearch = $this->picsGalleryModel->selectOne('id', 'picgallery_name = ?', [$photoGallery]);
                // pour chaque element dans le dossier permet de selectionner la photo en question de la db

                if ($photoIdSearch) {
                    $photoId = $photoIdSearch->id;
                    $imgLocation = "/admin/assets/imagesgalerie/" . $photoGallery;
                    echo '
                    <div class="mefPhotoGallery">
                        <img src="' . $imgLocation . '" alt="Photo de galerie" width="200" height="auto">
                                                <form action="" method="POST" enctype="multipart/form-data">
                            <input type="file" name="newImageGallery">
                            <button type="submit" name="modifyImageGallery" class="btn btn-primary">Modifier</button>
                            <input type="hidden" name="photoId" value="' . $photoId . '">
                            <input type="hidden" name="oldImageName" value="' . $photoGallery . '">
                        </form>
                        <form action="" method="POST">
                            <input type="hidden" name="photoId" value="' . $photoId . '">
                            <input type="hidden" name="photoName" value="' . $photoGallery . '">
                            <button type="submit" name="supprImageGallery" class="btn btn-danger">Supprimer</button>
                        </form>

                    </div>';
                }
            }
        } else {
            echo "Aucune photo téléchargée pour le moment.";
        }
    }

    public function addImage()
    {
        if (isset($_POST['addImageBtnGallery'])) {
            if (isset($_FILES['imageGallery']) && $_FILES['imageGallery']['error'] == 0) {

                $fileInfo = pathinfo($_FILES['imageGallery']['name']);
                // returne le nom du fichier téléchargé 
                $extension = strtolower($fileInfo['extension']);
                // convertit les extensions en minuscules au besoin

                if (in_array($extension, $this->extensions)) {
                    $imageMixName = time() . uniqid();
                    $imageNewName = $imageMixName . "." . $extension;
                    $fileRegister = $this->folderGallery . $imageNewName;
                    // Modifie l nom y ajoute l'extension, 
                    // et rajoute la photo dans le répertoire

                    $insertPhotoGallery = $this->picsGalleryModel->insert([
                        'picgallery_name' => $imageNewName
                    ]);
                    // le rajoute également à la base de données

                    if ($insertPhotoGallery && move_uploaded_file($_FILES['imageGallery']['tmp_name'], $fileRegister)) {
                        // verifie si l'insert et si le déplacement du fichier temporaire vers un permanant
                        // se sont bien passés.
                        echo "Photo ajoutée avec succès.";
                    } else {
                        echo "Erreur lors du déplacement de l'image.";
                    }
                } else {
                    echo "Extension non autorisée, le fichier doit être au format jpg, jpeg ou png !";
                }
            } else {
                echo "Erreur lors du téléchargement.";
            }
        }
    }

    public function modifyImage()
    {
        if (isset($_POST['modifyImageGallery']) && isset($_FILES['newImageGallery']) && $_FILES['newImageGallery']['error'] == 0) {
            $fileInfo = pathinfo($_FILES['newImageGallery']['name']);
            $extension = strtolower($fileInfo['extension']);

            if (in_array($extension, $this->extensions)) {
                $imageMixName = time() . uniqid();
                $imageNewName = $imageMixName . "." . $extension;
                $fileRegister = $this->folderGallery . $imageNewName;

                $photoId = $_POST['photoId'];
                $oldImageName = $_POST['oldImageName'];

                $updatePhoto = $this->picsGalleryModel->update($photoId, [
                    'picgallery_name' => $imageNewName
                ]);

                if ($updatePhoto && move_uploaded_file($_FILES['newImageGallery']['tmp_name'], $fileRegister)) {
                    unlink($this->folderGallery . $oldImageName);
                    echo "Image modifiée avec succès.";
                } else {
                    echo "Erreur lors de la mise à jour de l'image.";
                }
            } else {
                echo "Extension non autorisée.";
            }
        }
    }

    public function deleteImage()
    {
        if (isset($_POST['supprImageGallery'])) {
            $photoId = $_POST['photoId'];
            $photoName = $_POST['photoName'];

            $deletePhotoDb = $this->picsGalleryModel->delete('id', $photoId);
            $deletePhotoFolder = $this->folderGallery . $photoName;

            unlink($deletePhotoFolder);

            echo "L'image a été supprimée avec succès.";
        }
    }
}
