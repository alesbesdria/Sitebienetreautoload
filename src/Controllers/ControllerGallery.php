<?php

namespace Admin\Controllers;

use Admin\Models\Gallery;

class ControllerGallery
{
    protected $picsGalleryModel;
    protected $folderGallery = ROOT . "/admin/assets/imagesgalerie/";
    protected $extensions = ['jpeg', 'jpg', 'png'];

    public function __construct()
    {
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
        echo '<p>Chemin du dossier de la galerie: ' . $this->folderGallery . '</p>';
        $photosGallery = scandir($this->folderGallery);
        if ($photosGallery != 0) {
            foreach ($photosGallery as $photoGallery) {
                if ($photoGallery === '.' || $photoGallery === '..') {
                    continue;
                }

                $photoIdSearch = $this->picsGalleryModel->selectOne('id', 'picgallery_name = ?', [$photoGallery]);
                
                if ($photoIdSearch) {
                    $photoId = $photoIdSearch->id;
                    $imgLocation = $this->folderGallery . $photoGallery;

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
                $extension = strtolower($fileInfo['extension']);

                if (in_array($extension, $this->extensions)) {
                    $imageMixName = time() . uniqid();
                    $imageNewName = $imageMixName . "." . $extension;
                    $fileRegister = $this->folderGallery . $imageNewName;

                    $insertPhotoGallery = $this->picsGalleryModel->insert('picgallery_name',$imageNewName);

                    if (move_uploaded_file($_FILES['imageGallery']['tmp_name'], $fileRegister)) {
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

    public function deleteImage()
    {
        if (isset($_POST['supprImageGallery'])) {
            $photoId = $_POST['photoId'];
            $photoName = $_POST['photoName'];

            $deletePhotoDb = $this->picsGalleryModel->delete('id', '?', $photoId);
            $deletePhotoFolder = $this->folderGallery . $photoName;
            unlink($deletePhotoFolder);

            echo "L'image a été supprimée avec succès.";
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

                $updatePhoto = $this->picsGalleryModel->update('picgallery_name', $imageNewName, 'id', $photoId);
                
                if (move_uploaded_file($_FILES['newImageGallery']['tmp_name'], $fileRegister)) {
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
}