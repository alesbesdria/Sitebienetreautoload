<?php

namespace App\Controllers;

use App\Models\Contacts;
use App\Controllers\ControllerVerifs;

class ControllerContacts
{
    private $modelContact;

    public function __construct()
    {
        $this->modelContact = new Contacts();
    }

    public function index()
    {
        $view = ROOT . "/Views/contact.php";
        include ROOT . "/Views/template.php";
    }

    public function submit()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $validator = new ControllerVerifs();
            $nom = $validator->validateName($_POST['nom']);
            $prenom = $validator->validatePrenom($_POST['prenom']);
            $telephone = $validator->validateTelephone($_POST['telephone']);
            $email = $validator->validateEmail($_POST['email']);
            $sujet = $validator->validateSujet($_POST['sujet']);
            $message = $validator->validateMessage($_POST['message']);

            if ($validator->isFormValid()) {
                $data = [
                    'visitcontact_lastname' => $nom,
                    'visitcontact_firstname' => $prenom,
                    'visitcontact_mail' => $email,
                    'visitcontact_tel' => $telephone,
                    'visitcontact_date' => date('Y-m-d H:i:s'),
                    'visitcontact_sujet' => $sujet,
                    'visitcontact_message' => $message
                ];
                $this->modelContact->create($data);
                echo '<script>alert("Le formulaire a été soumis avec succès !"); window.location.href="/contacts";</script>';
            } else {
                $errors = $validator->getErrors();
                foreach ($errors as $field => $error) {
                    echo "<p>Erreur dans le champ $field : $error</p>";
                    $view = ROOT . "/Views/contact.php";
                    include ROOT . "/Views/template.php";
                }
            }
        }
    }
}
