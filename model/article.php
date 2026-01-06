<?php

class Article
{
    private $articleId;
    private $articleTitle;
    private $articleParagraph;
    private $approuve;
    private $idTheme;
    private $idClient;

    public function __construct(int $id, string $title, string $paragraph, int $approuve, int $idTheme, int $idClient)
    {
        $this->themeId = $id;
        $this->themeTitle = $title;
        $this->themeImage = $paragraph;
        $this->approuve = $approuve;
        $this->idTheme = $idTheme;
        $this->idClient = $idClient;
    }

    public static function addArticle(string $title, string $paragraph, int $idTheme, int $idClient): void
    {
        Database::request("INSERT INTO articles (articleTitle, articleParagraph, approuve, idTheme, idClient) VALUES (?, ?, ?, ?, ?);", [$title, $paragraph, 0, $idTheme, $idClient]);
    }

    public function editArticle(string $title, string $paragraph): void
    {
        Database::request("UPDATE articles SET articleTitle= ?, articleParagraph= ? WHERE articleId= ?;", [$title, $paragraph, $this->articleId]);
    }

    public function approuveArticle(): void
    {
        Database::request("UPDATE articles SET approuve= ? WHERE articleId= ?;", [1, $this->articleId]);
    }

    public function removeArticle(): void
    {
        Database::request("DELETE FROM articles WHERE articleId= ?;", [$this->articleId]);
    }

    public static function getArticlesOnTheme(int $idTheme): array
    {
        return Database::request("SELECT * FROM articles WHERE idTheme= ?;", [$idTheme]);
    }

    public static function getArticlesOnTag(array $idTags): array
    {
        return Database::request("SELECT * FROM articles;", []); /// Fix
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