<?php


namespace App\Models;

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

    //tableau associatif
    public function insert(array $infos)
    {
        $keys = implode(", ", array_keys($infos));
        // permet d'extraire les clés(colonne) du tableau et les séparent d'une virgule
        $placeholders = ":" . implode(", :", array_keys($infos));
        // lie les valeurs pour le bindvalue

        //!Je prepare ma requête en premier
        $req = $this->request->prepare("INSERT INTO $this->table ($keys) VALUES ($placeholders)");

        //je cree une boucle foreach pour bind chaque :key à sa value
        foreach ($infos as $key => $value) {
            $req->bindValue(":$key", $value);
        }
        //J'execute ma requête
        $req->execute();
        return $this->request->lastInsertId();
    }

    public function update($id, array $infos)
    {
        // je recupere les données des colonnes dans un tableau queryData
        $queryData = [];
        foreach ($infos as $key => $value) {
            $queryData[] = "$key = :$key"; // nom = :nom, prenom = :prenom
        }
        $queryDataStr = implode(", ", $queryData);
    
        //!Je prepare ma requette en premier
        $req = $this->request->prepare("UPDATE $this->table SET $queryDataStr WHERE id = :id");
    
        //je cree une boucle foreach pour bind chaque :key a sa value
        foreach ($infos as $key => $value) {
            $req->bindValue(":$key", $value);
        }
        $req->bindValue(":id", $id);
    
        //Jexecute ma requette
        $req->execute();
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
