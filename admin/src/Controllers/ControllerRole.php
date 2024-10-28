<?php

namespace Admin\Controllers;

use Admin\Models\Role;

class ControllerRole
{
    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new Role();
    }

    public function index()
    {
        $roles = $this->roleModel->selectAll();
        include($_SERVER["DOCUMENT_ROOT"] . "/views/roles/index.php");
    }

    public function create()
    {
        include($_SERVER["DOCUMENT_ROOT"] . "/views/roles/create.php");
    }

    public function store($roleData)
    {
        // Vérifie que le nom du rôle n'est pas vide avant d'ajouter
        if (!empty($roleData['role_name'])) {
            // Insertion du nouveau rôle dans la base de données avec la nouvelle méthode insert
            $this->roleModel->insert([
                'role_name' => $roleData['role_name'],
                'role_level' => $roleData['role_level']
            ]);
            header("Location: /roles");
            exit;
        } else {
            include($_SERVER["DOCUMENT_ROOT"] . "/views/roles/create.php");
        }
    }

    public function edit($id_role)
    {
        // Sélection d'un rôle spécifique pour l'édition
        $role = $this->roleModel->selectOne('*', 'id_role = ?', [$id_role]);
        include($_SERVER["DOCUMENT_ROOT"] . "/views/roles/edit.php");
    }

    public function update($id_role, $roleData)
    {
        // Vérifie que le nom du rôle n'est pas vide avant de procéder à la mise à jour
        if (!empty($roleData['role_name'])) {
            // Mise à jour du rôle dans la base de données en utilisant la nouvelle méthode update
            $this->roleModel->update($id_role, [
                'role_name' => $roleData['role_name'],
                'role_level' => $roleData['role_level']
            ]);
            header("Location: /roles");
            exit;
        } else {
            // Recharge le formulaire d'édition en cas d'erreur
            $role = $this->roleModel->selectOne('*', 'id_role = ?', [$id_role]);
            include($_SERVER["DOCUMENT_ROOT"] . "/views/roles/edit.php");
        }
    }

    public function delete($id_role)
    {
        // Suppression du rôle basé sur son identifiant
        $this->roleModel->delete('id_role', $id_role);
        header("Location: /roles");
        exit;
    }
}