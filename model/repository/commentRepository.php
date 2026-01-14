<?php

class CommentRepository
{
    public function insert (string $text, int $idArticle, int $idClient): void
    {
        Database::request("INSERT INTO commentArticles (commentText, idArticle, idClient) VALUES (?, ?, ?)", [$text, $idArticle, $idClient]);
    }

    public function update (string $text, int $id): void
    {
        Database::request("UPDATE commentArticles SET commentText= ?  WHERE commentId= ?;", [$commentText, $id]);
    }

    public function remove (int $id): void
    {
        Database::request("DELETE FROM commentArticles WHERE commentId= ?;", [$id]);
    }

    public function findById (int $id): array
    {
        return Database::request("SELECT * FROM commentArticles WHERE commentId= ?;", [$id]);
    }

    public function get (int $idArticle): array
    {
        return Database::request("SELECT * FROM commentArticles WHERE idArticle= ?;", [$idArticle]);
    }

    public function getTotal (int $idArticle): array
    {
        return Database::request("SELECT COUNT(*) AS total FROM `commentarticles` WHERE idArticle= ?;", [$idArticle]);
    }
}

?>