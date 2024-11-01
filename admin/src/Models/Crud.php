<?php

namespace Admin\Models;

use Admin\Models\pdoclass;

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
    public function selectFirst($objects = '*', $condition = '', $selection = [])
    {
        // n'est pas trouvée
        $req = "SELECT $objects FROM $this->table" . " LIMIT 1 ORDER BY id DESC";
        $result = $this->request->prepare($req);
        $result->execute($selection);
        return $result->fetch(\PDO::FETCH_OBJ);
    }

    public function insert(array $infos)
    {
        // je recupere les données des colonnes dans des tableau keys et placeholders
        $keys = implode(", ", array_keys($infos));
        $placeholders = ":" . implode(", :", array_keys($infos));

        //!Je prepare ma requette en premier
        $req = $this->request->prepare("INSERT INTO $this->table ($keys) VALUES ($placeholders)");

        //je cree une boucle foreach pour bind chaque :key a sa value
        foreach ($infos as $key => $value) {
            $req->bindValue(":$key", $value);
        }
        //Jexecute ma requette
        $req->execute();
        return $this->request->lastInsertId();
    }

    public function update($id, array $infos)
    {
        $queryData = [];
        foreach ($infos as $key => $value) {
            $queryData[] = "$key = :$key";
        }
        $queryDataStr = implode(", ", $queryData);
    
        $req = $this->request->prepare("UPDATE $this->table SET $queryDataStr WHERE id = :id");
    
        foreach ($infos as $key => $value) {
            $req->bindValue(":$key", $value);
        }
        $req->bindValue(":id", $id);
    
        return $req->execute();
    }


    // public function update($id, array $infos)
    // {
    //     // je recupere les données des colonnes dans un tableau queryData
    //     $queryData = [];
    //     foreach ($infos as $key => $value) {
    //         $queryData[] = "$key = :$key"; // nom = :nom, prenom = :prenom
    //     }
    //     $queryDataStr = implode(", ", $queryData);
    
    //     //!Je prepare ma requette en premier
    //     $req = $this->request->prepare("UPDATE $this->table SET $queryDataStr WHERE id = :id");
    
    //     //je cree une boucle foreach pour bind chaque :key a sa value
    //     foreach ($infos as $key => $value) {
    //         $req->bindValue(":$key", $value);
    //     }
    //     $req->bindValue(":id", $id);
    
    //     //Jexecute ma requette
    //     $req->execute();
    // }

    // //////////////////////
    public function delete($idname, $idnbr)
    {
        $req = "DELETE FROM $this->table WHERE $idname = :idnbr";
        $result = $this->request->prepare($req);
        $result->bindValue(':idnbr', $idnbr, \PDO::PARAM_INT);
        return $result->execute();
    }
    // public function delete($idname, $idnbr, $selection = [])
    // {
    //     $req = "DELETE FROM $this->table WHERE $idname = :idnbr";
    //     $result = $this->request->prepare($req);
    //     $result->bindValue(':idnbr', $idnbr, \PDO::PARAM_INT);
    //     return $result->execute($selection);
    // }

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





// public function insert($columnname, $newdata)
//     {
//         $columns = implode(', ', $columnname);
//         $placeholders = implode(', ', array_fill(0, count($newdata), '?'));
//         $req = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
//         $result = $this->request->prepare($req);
//         return $result->execute($newdata);
//     }

//     public function update($columnname, $newdata, $idname, $idnbr, $selection = [])
//     {
//         $req = "UPDATE $this->table SET $columnname = ? WHERE $idname = ?";
//         $result = $this->request->prepare($req);

//         $params = array_merge([$newdata, $idnbr], $selection);
//         return $result->execute($params);
//     }