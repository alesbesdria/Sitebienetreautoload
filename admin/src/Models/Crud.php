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

        //Je prepare ma requête en premier
        $req = $this->request->prepare("INSERT INTO $this->table ($keys) VALUES ($placeholders)");

        //je cree une boucle foreach pour bind chaque :key à sa value
        foreach ($infos as $key => $value) {
            $req->bindValue(":$key", $value);
        }
        //J'éxecute ma requête
        $req->execute();
    }

    public function update($id, array $infos)
    {
        // Je prépare un tableau pour stocker les colonnes et leurs valeurs liées (ex. "colonne = :colonne")
        $tabData = [];
        foreach ($infos as $key => $value) {
            $tabData[] = "$key = :$key";
        }

        // Je transforme le tableau en une chaîne de caractères séparée par des virgules
        $tabstrData = implode(", ", $tabData);

        // je prépare ma requête
        $req = $this->request->prepare("UPDATE $this->table SET $tabstrData WHERE id = :id");

        //je lie chaque clés aux valeurs passées dans le tableau
        foreach ($infos as $key => $value) {
            $req->bindValue(":$key", $value);
        }
        // la même chose pour l'id
        $req->bindValue(":id", $id);

        return $req->execute();
    }

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



