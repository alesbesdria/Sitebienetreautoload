<?php
class FormValidator {
    private $errors = [];

    // Nettoyer les données pour éviter les failles XSS
    private function sanitize($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    // Vérification du nom (uniquement des lettres et des espaces)
    public function validateName($name) {
        $name = $this->sanitize($name);
        if (!preg_match("/^[a-zA-ZÀ-ÿ '-]+$/", $name)) {
            $this->errors['nom'] = "Nom invalide. Seules les lettres et espaces sont autorisés.";
        }
        return $name;
    }

    // Vérification du prénom (mêmes règles que pour le nom)
    public function validatePrenom($prenom) {
        $prenom = $this->sanitize($prenom);
        if (!preg_match("/^[a-zA-ZÀ-ÿ '-]+$/", $prenom)) {
            $this->errors['prenom'] = "Prénom invalide. Seules les lettres et espaces sont autorisés.";
        }
        return $prenom;
    }

    // Vérification du numéro de téléphone (format français)
    public function validateTelephone($telephone) {
        $telephone = $this->sanitize($telephone);
        if (!preg_match("/^[0-9]{10}$/", $telephone)) {
            $this->errors['telephone'] = "Numéro de téléphone invalide. Il doit contenir 10 chiffres.";
        }
        return $telephone;
    }

    // Vérification de l'email
    public function validateEmail($email) {
        $email = $this->sanitize($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Adresse email invalide.";
        }
        return $email;
    }

    // Vérification du sujet
    public function validateSujet($sujet) {
        $sujet = $this->sanitize($sujet);
        if (empty($sujet)) {
            $this->errors['sujet'] = "Le sujet est requis.";
        }
        return $sujet;
    }

    // Vérification du message
    public function validateMessage($message) {
        $message = $this->sanitize($message);
        if (empty($message)) {
            $this->errors['message'] = "Le message ne peut pas être vide.";
        }
        return $message;
    }

    // Fonction pour vérifier si le formulaire est valide
    public function isFormValid() {
        return empty($this->errors);
    }

    // Retourner les erreurs
    public function getErrors() {
        return $this->errors;
    }
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once 'FormValidator.php'; // Inclure la classe de validation

    $validator = new FormValidator();

    // Récupérer et valider les données du formulaire
    $nom = $validator->validateName($_POST['nom']);
    $prenom = $validator->validatePrenom($_POST['prenom']);
    $telephone = $validator->validateTelephone($_POST['telephone']);
    $email = $validator->validateEmail($_POST['email']);
    $sujet = $validator->validateSujet($_POST['sujet']);
    $message = $validator->validateMessage($_POST['message']);

    // Vérifier si le formulaire est valide
    if ($validator->isFormValid()) {
        // Si tout est correct, traiter les données
        // Par exemple, envoyer un email ou stocker les informations dans une base de données

        echo "Le formulaire a été soumis avec succès !";
    } else {
        // Si des erreurs sont présentes, les afficher
        $errors = $validator->getErrors();
        foreach ($errors as $field => $error) {
            echo "<p>Erreur dans le champ $field : $error</p>";
        }
    }
}
?>