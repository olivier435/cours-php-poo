<?php

require_once('libraries/models/Model.php');

class Comment extends Model
{

    /**
     * retourne les articles classes par date de creation
     *
     * @param integer $article_id
     * @return array
     */
    public function findallByArticle(int $article_id): array
    {

        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id ORDER BY created_at DESC");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();
        return $commentaires;
    }

    /**
     * retourne un commentaire de la base de donéne grace a son identifiant
     * @param integer $id
     * @return array |bool le commantaire si one le trouve, false si on ne le trouve pas
     */

    public function findt(int $id)
    {

        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        $comment = $query->fetch();
        return $comment;
    }


    /**
     * supprimer un commentaire gace a un identifiant
     * 
     * @param integer $id
     * @return void le commentaire si on le trouve false si on ne le trouve pas
     */



    public function delete(int $id): void

    {

        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }
    /**
     * Undocumented function
     *
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id): void
    {


        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, 
         created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}
