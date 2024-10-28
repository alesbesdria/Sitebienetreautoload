<?php

namespace Admin\Controllers;

use Admin\Models\Picprofil;

class ControllerProfil
{
    protected $picProfilModel;
    private $folderProfil;

    public function __construct()
    {
        $this->folderProfil = $_SERVER["DOCUMENT_ROOT"] . "/admin/assets/imageprofil/";
        $this->picProfilModel = new Picprofil();
    }

    public function index()
    {   
        $title = "Gestion administrateur";
        $titlesecond = "Changement de photo de profil";
        $view = ROOT . "/admin/Views/photoprofil.php";        
        $message = $this->upload(); 
        include ROOT . "/admin/views/template.php";
    }

    public function upload()
    {
        $imageName = 'photo_profil.jpg'; 
        $extensions = ['jpeg', 'jpg', 'png']; 
        
        if (isset($_POST['addImageBtn'])) {
            if (isset($_FILES['imageProfil']) && $_FILES['imageProfil']['error'] == 0) {
                $fileInfo = pathinfo($_FILES['imageProfil']['name']);
                $extension = strtolower($fileInfo['extension']);
    
                if (in_array($extension, $extensions)) {
                    $fileRegister = $this->folderProfil . $imageName;
    
                    if (move_uploaded_file($_FILES['imageProfil']['tmp_name'], $fileRegister)) {
                        $this->picProfilModel->update(
                            'DefaultUser',  // Identifiant de l'utilisateur
                            ['picprofil_photo' => $imageName] // Tableau associatif pour la mise à jour
                        );
    
                        return "Modification réussie !";
                    } else {
                        return "Photo non enregistrée !";
                    }
                } else {
                    return "Extension non autorisée, votre fichier doit être au format : jpg, jpeg ou png !";
                }
            } else {
                return "Erreur lors du téléchargement.";
            }
        }
        
        return null; 
    }
}
?>