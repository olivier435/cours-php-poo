<?php

$pdo = new Database();
$pdo = $pdo->getPdo();

$pdo = Database::getPdo(); //qu'est ce qu'une methode static=  c'est une methode qui appartient a la class elle meme
//difference methode  instance et methode static methode objet qui sont instance
// appartient à un objet

class Database
{
    /**
     * Retourne une connexion à la base de données
     *
     * @return PDO
     */
    public static  function getPdo(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        return $pdo;
    }
}
