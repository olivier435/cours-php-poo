<?php
//retravaille sur la requete sur les reponses
class Http
{
    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }
}
