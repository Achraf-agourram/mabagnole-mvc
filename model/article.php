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

    public function __construct(int $id, string $title, string $image, array $tags, string $paragraph, int $approuve, int $idTheme, int $idClient)
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

    public static function addArticle(string $title, ?string $image, array $tags, string $paragraph, int $idTheme, int $idClient): bool
    {
        try{
            Database::request("INSERT INTO articles (articleTitle, articleImage, articleParagraph, approuve, idTheme, idClient) VALUES (?, ?, ?, ?, ?, ?);", [$title, $image, $paragraph, 0, $idTheme, $idClient]);
            $articleId = Database::getLastArticle();

            foreach($tags as $tag) Database::request("INSERT INTO article_tag (article_id, tag_id) VALUES (?, ?)", [$articleId, Tag::getTagId($tag)]);
            
            if($image) move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
            return true;

        }catch (Exception $e) {return false;}
    }

    public function editArticle(string $title, string $image, string $paragraph): bool
    {
        try{
            Database::request("UPDATE articles SET articleTitle= ?, articleImage= ?, articleParagraph= ? WHERE articleId= ?;", [$title, $image, $paragraph, $this->articleId]);
        }catch (Exception $e) {return false;}
    }

    public function approuveArticle(): bool
    {
        try{
            Database::request("UPDATE articles SET approuve= ? WHERE articleId= ?;", [1, $this->articleId]);
        }catch (Exception $e) {return false;}
    }

    public function removeArticle(): bool
    {
        try{
            Database::request("DELETE FROM articles WHERE articleId= ?;", [$this->articleId]);
            return true;

        }catch (Exception $e) {return false;}
    }

    public static function getAllArticles(): bool|array
    {
        try{
            $allArticles = [];
            $articles = Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId;", []);

            foreach($articles as $article)
            {
                $articleTags = Tag::getTagsByArticle($article->articleId);
                array_push($allArticles, new Article($article->articleId, $article->articleTitle, $article->articleImage, $articleTags, $article->articleParagraph, $article->approuve, $article->idTheme, $article->idClient));
            }
            return $allArticles;

        }catch (Exception $e) {return false;}
    }

    public static function getArticlesOnTheme(int $idTheme): bool|array
    {
        try{ 
            return Database::request("SELECT * FROM articles WHERE idTheme= ?;", [$idTheme]);
        }catch (Exception $e) {return false;}
    }

    public static function getArticlesOnTag(array $idTags): bool|array
    {
        try{
            return Database::request("SELECT * FROM articles;", []); /// Fix
        }catch (Exception $e) {return false;}
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