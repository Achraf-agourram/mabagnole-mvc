<?php

class Article
{
    private $articleId;
    private $articleTitle;
    private $articleImage;
    private $articleParagraph;
    private $approuve;
    private ?array $tags = null;
    private $idTheme;
    private $idClient;

    public function __construct(int $id, string $title, string $image, ?array $tags, string $paragraph, int $approuve, int $idTheme, int $idClient)
    {
        $this->articleId = $id;
        $this->articleTitle = $title;
        $this->articleImage = $image;
        $this->articleParagraph = $paragraph;
        $this->approuve = $approuve;
        $this->tags = $tags;
        $this->idTheme = $idTheme;
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