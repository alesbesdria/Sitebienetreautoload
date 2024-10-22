<?php


namespace App\Models;

use App\Models\pdoclass;



class Crud extends pdoclass
{
    protected $request;
    protected string $table;

    public function __construct()
    {
        $this->request = pdoclass::getInstance();
    }

    protected function getRequest()
    {
        return $this->request;
    }

    public function selectAll($objects = '*', $condition = '', $selection = [])
    {
        $req = "SELECT $objects FROM $this->table" . ($condition ? " WHERE $condition" : "");
        $result = $this->request->prepare($req);
        $result->execute($selection);
        return $result->fetchAll(\PDO::FETCH_OBJ);
    }

    public function selectOne($objects = '*', $condition = '', $selection = [])
    {
        $req = "SELECT $objects FROM $this->table" . ($condition ? " WHERE $condition" : "");
        $result = $this->request->prepare($req);
        $result->execute($selection);
        return $result->fetch(\PDO::FETCH_OBJ);
    }

    public function insert($columnname, $newdata)
    {
        $columns = implode(', ', $columnname);
        $placeholders = implode(', ', array_fill(0, count($newdata), '?'));
        $req = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $result = $this->request->prepare($req);
        return $result->execute($newdata);
    }

    public function update($columnname, $newdata, $idname, $idnbr, $selection = [])
    {
        $req = "UPDATE $this->table SET $columnname = :newdata WHERE $idname = :idnbr";
        $result = $this->request->prepare($req);
        $result->bindValue(':newdata', $newdata, \PDO::PARAM_STR);
        $result->bindValue(':idnbr', $idnbr, \PDO::PARAM_INT);
        return $result->execute($selection);
    }

    public function delete($idname, $idnbr, $selection = [])
    {
        $req = "DELETE FROM $this->table WHERE $idname = :idnbr";
        $result = $this->request->prepare($req);
        $result->bindValue(':idnbr', $idnbr, \PDO::PARAM_INT);
        return $result->execute($selection);
    }


    public function search($id)
    {
        $req = $this->request->prepare("
        SELECT * FROM {$this->table} WHERE id= :id;
        ");
        $req->bindValue(":id", $id, \PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(\PDO::FETCH_OBJ);
    }
}
