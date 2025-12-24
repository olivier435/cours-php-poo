<?php

require_once('libraries/models/Model.php');
/**
 * retourne les articles classes par date de creation
 *
 * @return array
 */
class Article extends Model
{

    //regroupe toutes les fonctions dans l'article
    public function findall(): array
    {


        $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        $articles = $resultats->fetchAll();
        return $articles;
    }
    /**
     * 
     * @param integer $id
     * @return void
     */



    public function find(int $id)

    {


        $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['article_id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $article = $query->fetch();
        return $article;
    }

    /**
     * supprimer un article dans la base grace a son identifiant
     *
     * @param integer $id
     * @return void 
     */


    public function delete(int $id): void
    {


        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
