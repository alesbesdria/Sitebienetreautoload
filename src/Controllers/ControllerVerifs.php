<?php

namespace App\Controllers;

class ControllerVerifs {
    private $errors = [];

    private function sanitize($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    public function validateName($name) {
        $name = $this->sanitize($name);
        if (!preg_match("/^[a-zA-ZÀ-ÿ '-]+$/", $name)) {
            $this->errors['nom'] = "Nom invalide. Seules les lettres et espaces sont autorisés.";
        }
        return $name;
    }

    public function validatePrenom($prenom) {
        $prenom = $this->sanitize($prenom);
        if (!preg_match("/^[a-zA-ZÀ-ÿ '-]+$/", $prenom)) {
            $this->errors['prenom'] = "Prénom invalide. Seules les lettres et espaces sont autorisés.";
        }
        return $prenom;
    }

    public function validateTelephone($telephone) {
        $telephone = $this->sanitize($telephone);
        if (!preg_match("/^[0-9]{10}$/", $telephone)) {
            $this->errors['telephone'] = "Numéro de téléphone invalide. Il doit contenir 10 chiffres.";
        }
        return $telephone;
    }

    public function validateEmail($email) {
        $email = $this->sanitize($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Adresse email invalide.";
        }
        return $email;
    }

    public function validateSujet($sujet) {
        $sujet = $this->sanitize($sujet);
        if (empty($sujet)) {
            $this->errors['sujet'] = "Le sujet est requis.";
        }
        return $sujet;
    }

    public function validateMessage($message) {
        $message = $this->sanitize($message);
        if (empty($message)) {
            $this->errors['message'] = "Le message ne peut pas être vide.";
        }
        return $message;
    }

    public function isFormValid() {
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once 'FormValidator.php'; 

    $validator = new ControllerVerifs();

    $nom = $validator->validateName($_POST['nom']);
    $prenom = $validator->validatePrenom($_POST['prenom']);
    $telephone = $validator->validateTelephone($_POST['telephone']);
    $email = $validator->validateEmail($_POST['email']);
    $sujet = $validator->validateSujet($_POST['sujet']);
    $message = $validator->validateMessage($_POST['message']);

    if ($validator->isFormValid()) {

        echo "Le formulaire a été soumis avec succès !";
    } else {
        $errors = $validator->getErrors();
        foreach ($errors as $field => $error) {
            echo "<p>Erreur dans le champ $field : $error</p>";
        }
    }
}
?>