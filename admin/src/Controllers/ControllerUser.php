<?php

namespace Admin\Controllers;

use Admin\Models\User;
use Admin\Models\Role;

class ControllerUser
{
    private $userModel;
    private $roleModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->roleModel = new Role();
    }

    // Liste tous les utilisateurs
    public function index()
    {
        $title = "Gestion administrateur";
        $titlesecond = "Liste utilisateurs";
        
        // Récupérer tous les utilisateurs
        $users = $this->userModel->selectAll();
        $view = ROOT . "/admin/views/user.php";
        include ROOT . "/admin/views/template.php";

    }

    // Affiche le formulaire d'ajout d'utilisateur
    public function create()
    {
        $roles = $this->roleModel->selectAll();
        include ROOT . "/admin/views/user/create.php"; // Assurez-vous que ce fichier existe
    }

    // Enregistre un nouvel utilisateur
    public function store($userData)
    {
        if ($this->validateUserForm($userData)) {
            $hashedPassword = password_hash($userData['user_mdp'], PASSWORD_BCRYPT);
            $userData['user_mdp'] = $hashedPassword;

            // Insérer l'utilisateur dans la base de données
            $this->userModel->insert(
                ['user_firstname', 'user_lastname', 'user_mail', 'id_role', 'user_mdp'],
                array_values($userData)
            );

            header("Location: /admin/user/index"); // Redirection après insertion
            exit; // Important de sortir pour éviter l'exécution de code supplémentaire
        } else {
            $roles = $this->roleModel->selectAll();
            include ROOT . "/admin/views/user/create.php"; // Afficher le formulaire avec erreurs
        }
    }

    // Affiche le formulaire de modification d'utilisateur
    public function edit($id_user)
    {
        error_log("ID utilisateur reçu: " . $id_user); // Ajoute cette ligne pour le debug 

        $userId = is_array($id_user) ? $id_user[0] : $id_user; // Assurez-vous que c'est une valeur unique
        $user = $this->userModel->selectOne('*', 'id_user = ?', [$userId]);

        if (!$user) {
            // Gérer le cas où l'utilisateur n'existe pas
            http_response_code(404);
            echo "L'utilisateur avec l'ID $id_user n'existe pas.";
            exit();
        }

        $user = $this->userModel->selectOne('*', 'id_user = ?', [$id_user]);
        $roles = $this->roleModel->selectAll();
        include ROOT . "/admin/Views/edit_user.php"; // Assurez-vous que ce fichier existe
    }

    // Met à jour un utilisateur existant
    public function update($id_user, $userData)
    {
        error_log("Mise à jour de l'utilisateur ID: " . $id_user);

        if ($this->validateUserForm($userData)) {
            if (!empty($userData['user_mdp'])) {
                $userData['user_mdp'] = password_hash($userData['user_mdp'], PASSWORD_BCRYPT);
            } else {
                unset($userData['user_mdp']);  // Ne pas mettre à jour le mot de passe si vide
            }

            // Mettre à jour l'utilisateur dans la base de données
            $this->userModel->update(
                'user_firstname = ?, user_lastname = ?, user_mail = ?, id_role = ?, user_mdp = ?',
                array_values($userData),
                'id_user',
                $id_user
            );
// $view = ROOT . "/admin/user";
            header("Location: /admin/user"); // Redirection après mise à jour
            exit; // Important de sortir
        } else {
            $user = $this->userModel->selectOne('*', 'id_user = ?', [$id_user]);
            $roles = $this->roleModel->selectAll();
            include ROOT . "/admin/views/user/edit_user.php"; // Afficher le formulaire avec erreurs
        }
    }

    // Supprime un utilisateur
    public function delete($id_user)
    {
        $this->userModel->delete('id_user', $id_user);
        header("Location: /admin/user"); // Redirection après suppression
        exit; // Important de sortir
    }

    // Validation du formulaire utilisateur
    private function validateUserForm($data)
    {
        $errors = [];
        if (empty($data['user_firstname']) || !preg_match('/^[a-zA-Z ]+$/', $data['user_firstname'])) {
            $errors['user_firstname'] = "Le prénom n'est pas valide.";
        }
        if (empty($data['user_lastname']) || !preg_match('/^[a-zA-Z ]+$/', $data['user_lastname'])) {
            $errors['user_lastname'] = "Le nom n'est pas valide.";
        }
        if (empty($data['user_mail']) || !filter_var($data['user_mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['user_mail'] = "L'email n'est pas valide.";
        }
        if (empty($data['user_mdp']) || $data['user_mdp'] != $data['confMdp']) {
            $errors['user_mdp'] = "Les mots de passe ne correspondent pas.";
        }
        return empty($errors);
    }
}