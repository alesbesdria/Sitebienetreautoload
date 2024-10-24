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
        if (!empty($roleData['role_name'])) {
            $this->roleModel->insert(['role_name', 'role_level'], array_values($roleData));
            header("Location: /roles");
        } else {
            include($_SERVER["DOCUMENT_ROOT"] . "/views/roles/create.php");
        }
    }

    public function edit($id_role)
    {
        $role = $this->roleModel->selectOne('*', 'id_role = ?', [$id_role]);
        include($_SERVER["DOCUMENT_ROOT"] . "/views/roles/edit.php");
    }

    public function update($id_role, $roleData)
    {
        if (!empty($roleData['role_name'])) {
            $this->roleModel->update('role_name = ?, role_level = ?', array_values($roleData), 'id_role', $id_role);
            header("Location: /roles");
        } else {
            $role = $this->roleModel->selectOne('*', 'id_role = ?', [$id_role]);
            include($_SERVER["DOCUMENT_ROOT"] . "/views/roles/edit.php");
        }
    }

    public function delete($id_role)
    {
        $this->roleModel->delete('id_role', $id_role);
        header("Location: /roles");
    }
}