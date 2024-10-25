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

    public function index()
    {
        $title = "Gestion administrateur";
        $titlesecond = "Liste utilisateurs";

        $users = $this->userModel->selectAll();
        $view = ROOT . "/admin/Views/user.php";
        include ROOT . "/admin/Views/template.php";
    }

    public function create()
    {
        $title = "Gestion administrateur";
        $titlesecond = "Ajout d'un nouvel utilisateur";
        $roles = $this->roleModel->selectAll();
        $view =  ROOT . "/admin/Views/create.php"; 
        include ROOT . "/admin/Views/template.php";

    }

    public function store($userData)
    {
        if ($this->validateUserForm($userData)) {
            $hashedPassword = password_hash($userData['user_mdp'], PASSWORD_BCRYPT);
            $userData['user_mdp'] = $hashedPassword;

            $this->userModel->insert(
                ['user_firstname', 'user_lastname', 'user_mail', 'id_role', 'user_mdp'],
                array_values($userData)
            );

            header("Location: /admin/user/index"); 
            exit; 
        } else {
            $roles = $this->roleModel->selectAll();
            // include ROOT . "/admin/views/insert_user.php"; // Afficher le formulaire avec erreurs
            $view =  ROOT . "/admin/Views/insert_user.php"; 
            include ROOT . "/admin/Views/template.php";
        }
    }

    public function edit($id_user)
    {
        $userId = is_array($id_user) ? $id_user[0] : $id_user; 
        $user = $this->userModel->selectOne('*', 'id_user = ?', [$userId]);

        if (!$user) {
            http_response_code(404);
            echo "L'utilisateur avec l'ID $id_user n'existe pas.";
            exit();
        }

        $roles = $this->roleModel->selectAll();
        include ROOT . "/admin/Views/edit_user.php"; 
    }

    public function update($id_user)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = []; 

            error_log("Mise à jour de l'utilisateur avec l'ID : " . $id_user);
            var_dump($_POST); 


            if (empty($_POST['user_firstname'])) {
                $errors['user_firstname'] = "Le prénom est requis.";
            }
            if (empty($_POST['user_lastname'])) {
                $errors['user_lastname'] = "Le nom est requis.";
            }
            if (empty($_POST['user_mail']) || !filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL)) {
                $errors['user_mail'] = "L'email est requis et doit être valide.";
            }
            if (isset($_POST['user_mdp']) && $_POST['user_mdp'] !== $_POST['confMdp']) {
                $errors['user_mdp'] = "Les mots de passe ne correspondent pas.";
            }

            if (empty($errors)) {
                error_log("ID utilisateur reçu: " . $id_user); 
///////////////////////////////
                $userId = is_array($id_user) ? $id_user[0] : $id_user; 
                $user = $this->userModel->selectOne('*', 'id_user = ?', [$userId]);

                $userData = [
                    'user_firstname' => $_POST['user_firstname'],
                    'user_lastname' => $_POST['user_lastname'],
                    'user_mail' => $_POST['user_mail'],
                    'id_role' => $_POST['id_role'], 
                    'user_mdp' => $_POST['user_mdp'] ? password_hash($_POST['user_mdp'], PASSWORD_BCRYPT) : null,
                ];

                var_dump($userData);    
                die;
                if (empty($userData['user_mdp'])) {
                    unset($userData['user_mdp']);
                }
// //////////////////////////////////////////////////
                $this->userModel->update(
                    'user_firstname = ?, user_lastname = ?, user_mail = ?, id_role = ?, user_mdp = ?',
                    array_values($userData),
                    'id_user',
                    $userId
                );

                header("Location: " . ROOT . "/admin/user");
                exit(); 
            } else {
                $user = $this->userModel->selectOne('*', 'id_user = ?', [$id_user]);
                $roles = $this->roleModel->selectAll();
                include ROOT . "/admin/Views/edit_user.php"; 
            }
        }
    }

    public function delete($id_user)
    {
        $this->userModel->delete('id_user', $id_user);
        header("Location: /admin/user"); 
        exit; 
    }

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
