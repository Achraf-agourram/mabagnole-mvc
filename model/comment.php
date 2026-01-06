<?php

class commentArticle
{
    private $commentId;
    private $commentText;
    private $idArticle;
    private $idClient;

    public function __construct(int $id, string $text, int $idArticle, int $idClient)
    {
        $this->commentId = $id;
        $this->commentText = $text;
        $this->idArticle = $idArticle;
        $this->idClient = $idClient;
    }

    public static function addComment($commentText, $idArticle, $idClient): void
    {
        Database::request("INSERT INTO commentArticles (commentText, idArticle, idClient) VALUES (?, ?, ?)", [$commentText, $idArticle, $idClient]);
    }
    
    public function editComment($commentText): void
    {
        Database::request("UPDATE SET commentText= ? FROM commentArticles WHERE commentId= ?;", [$commentText, $this->tagId]);
    }

    public function removeComments(): void
    {
        Database::request("DELETE FROM commentArticles WHERE commentId= ?;", [$this->tagId]);
    }

    public static function getComments($idArticle): array
    {
        Database::request("SELECT * FROM commentArticles WHERE idArticle= ?;", [$idArticle]);
    }

    public function __get($property)
    {
        return $this->$property;
    }
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

}

?>