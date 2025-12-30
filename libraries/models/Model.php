<?php

namespace Models;

use Database;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }
    /**
     * 
     * @param integer $id
     * @return void
     */
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }
    /**
     * supprimer un commentaire gace a un identifiant
     * 
     * @param integer $id
     * @return void le commentaire si on le trouve false si on ne le trouve pas
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
    /**
     * retourne la liste des articles clases par date de creation
    
     *@return array
     */
    public function findall(?string $order = ""): array
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($order) {
            $sql .= " ORDER BY " . $order; //rajouter 
        }
        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();
        return $articles;
    }
}
