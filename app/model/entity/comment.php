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