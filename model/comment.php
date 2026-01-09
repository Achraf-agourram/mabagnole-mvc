<?php

class Comment
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

    public static function addComment($commentText, $idArticle, $idClient): bool
    {
        try{
            Database::request("INSERT INTO commentArticles (commentText, idArticle, idClient) VALUES (?, ?, ?)", [$commentText, $idArticle, $idClient]);
            return true;
        }
        catch(Exception $e) {return false;}
    }
    
    public function editComment($commentText): bool
    {
        global $connectedUser;
        try{
            if($connectedUser->id === $this->idClient)
            {
                Database::request("UPDATE commentArticles SET commentText= ?  WHERE commentId= ?;", [$commentText, $this->commentId]);
                return true;
            }
            return false;

        }catch(Exception $e){return false;}
    }

    public function removeComment(): bool
    {
        global $connectedUser;
        try{
            if($connectedUser->id === $this->idClient)
            {
                Database::request("DELETE FROM commentArticles WHERE commentId= ?;", [$this->commentId]);
                return true;
            }
            return false;

        }catch(Exception $e){return false;}
    }

    public static function findComment($id): ?Comment
    {
        $foundComment = Database::request("SELECT * FROM commentArticles WHERE commentId= ?;", [$id]);
        if(!$foundComment) return null;

        $foundComment = $foundComment[0];
        return new Comment($foundComment->commentId, $foundComment->commentText, $foundComment->idArticle, $foundComment->idClient);
    }

    public static function getComments($idArticle): array
    {
        $allComments = [];
        foreach(Database::request("SELECT * FROM commentArticles WHERE idArticle= ?;", [$idArticle]) as $comment) array_push($allComments, new Comment($comment->commentId, $comment->commentText, $comment->idArticle, $comment->idClient));
        return $allComments;
    }

    public static function getCommentsTotalOfArticle($idArticle): int
    {
        return Database::request("SELECT COUNT(*) AS total FROM `commentarticles` WHERE idArticle= ?;", [$idArticle])[0]->total;
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