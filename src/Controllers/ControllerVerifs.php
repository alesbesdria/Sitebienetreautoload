<?php
namespace App\Controllers;

class ControllerVerifs {
    private $errors = [];

    public function sanitize($data) {
        return htmlspecialchars(trim($data ?? ''));
    }

    public function validateName($name) {
        $name = $this->sanitize($name);
        if (empty($name)) $this->errors['visitcontact_lastname'] = "Le nom est requis.";
        return $name;
    }

    public function validatePrenom($prenom) {
        $prenom = $this->sanitize($prenom);
        if (empty($prenom)) $this->errors['visitcontact_firstname'] = "Le prénom est requis.";
        return $prenom;
    }

    public function validateTelephone($telephone) {
        $telephone = $this->sanitize($telephone);
        if (empty($telephone)) $this->errors['visitcontact_tel'] = "Le téléphone est requis.";
        return $telephone;
    }

    public function validateEmail($email) {
        $email = $this->sanitize($email);
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['visitcontact_mail'] = "L'email est invalide.";
        }
        return $email;
    }

    public function validateSujet($sujet) {
        $sujet = $this->sanitize($sujet);
        if (empty($sujet)) $this->errors['visitcontact_sujet'] = "Le sujet est requis.";
        return $sujet;
    }

    public function validateMessage($message) {
        $message = $this->sanitize($message);
        if (empty($message)) $this->errors['visitcontact_message'] = "Le message est requis.";
        return $message;
    }

    public function isFormValid() {
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}
