<?php

namespace Admin\Controllers;

use Admin\Models\Picprofil;

class ControllerProfil
{
    protected $picProfilModel;

    public function __construct()
    {
        $this->picProfilModel = new Picprofil();
    }

    public function index()
    {   
        $title = "Gestion administrateur";
        $titlesecond = "Changement de photo de profil";
        $view = ROOT . "/admin/Views/photoprofil.php";        
        $message = $this->handleUpload(); 

        include ROOT . "/admin/views/template.php";
    }

    public function handleUpload()
    {
        $folderProfil = 'assets/imageprofil/';
        $imageName = 'photo_profil.jpg'; 
        $extensions = ['jpeg', 'jpg', 'png']; 
        
        if (isset($_POST['addImageBtn'])) {
            if (isset($_FILES['imageProfil']) && $_FILES['imageProfil']['error'] == 0) {
                $fileInfo = pathinfo($_FILES['imageProfil']['name']);
                $extension = strtolower($fileInfo['extension']);
    
                if (in_array($extension, $extensions)) {
                    $fileRegister = $folderProfil . $imageName;
    
                    if (move_uploaded_file($_FILES['imageProfil']['tmp_name'], $fileRegister)) {
                        $this->picProfilModel->update(
                            'picprofil_photo', 
                            $imageName,        
                            'picprofil_name',  
                            'DefaultUser'      
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