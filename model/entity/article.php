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


/*
public static function addArticle(string $title, string $image, ?array $tags, string $paragraph, int $idTheme, int $idClient): bool
    {
        try{
            if($image) move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
            else $image = "unavailable.png";

            Database::request("INSERT INTO articles (articleTitle, articleImage, articleParagraph, approuve, idTheme, idClient) VALUES (?, ?, ?, ?, ?, ?);", [$title, $image, $paragraph, 0, $idTheme, $idClient]);
            $articleId = Database::getLastArticle();

            if($tags) foreach($tags as $tag) Database::request("INSERT INTO article_tag (article_id, tag_id) VALUES (?, ?)", [$articleId, Tag::getTagId($tag)]);
            
            return true;

        }catch (Exception $e) {return false;}
    }

    public function editArticle(string $title, ?array $tags, string $image, string $paragraph): bool
    {
        global $connectedUser;
        try{
            if($connectedUser->id === $this->idClient) {
                if($image) move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
                else $image = "unavailable.png";
                
                Database::request("DELETE FROM `article_tag` WHERE article_id= ?;", [$this->articleId]);
                if($tags) foreach($tags as $tag) Database::request("INSERT INTO article_tag (article_id, tag_id) VALUES (?, ?)", [$this->articleId, Tag::getTagId($tag)]);

                Database::request("UPDATE articles SET articleTitle= ?, articleImage= ?, articleParagraph= ?, approuve= ? WHERE articleId= ?;", [$title, $image, $paragraph, 0, $this->articleId]);
                return true;
            }
            return false;

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
        global $connectedUser;
        try{
            if($connectedUser->id === $this->idClient) {
                Database::request("DELETE FROM articles WHERE articleId= ?;", [$this->articleId]);
                return true;
            }
            
            return false;

        }catch (Exception $e) {return false;}
    }

    public static function getArticleById($id): bool|object
    {
        try{
            $article = Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId WHERE approuve= 1 AND articleId = ?;", [$id]);
            return Tag::linkTagsWithArticles($article)[0];

        }catch (Exception $e) {return false;}
    }

    public static function getAllArticles(): bool|array
    {
        try{
            $articles = Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId WHERE approuve= 1;", []);
            return Tag::linkTagsWithArticles($articles);

        }catch (Exception $e) {return false;}
    }

    public static function getArticlesOnTheme(int $idTheme): bool|array
    {
        try{
            $articles = Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId WHERE approuve= 1 AND idTheme= ?;", [$idTheme]);
            return Tag::linkTagsWithArticles($articles);

        }catch (Exception $e) {return false;}
    }

    public static function getArticlesOnTag(int $idTag): bool|array
    {
        try{
            $articles = [];
            $ids = Database::request("SELECT article_id FROM `article_tag` WHERE tag_id= ?;", [$idTag]);
            foreach($ids as $id) array_push($articles, Article::getArticleById($id->article_id));

            return $articles;

        }catch (Exception $e) {return false;}
    }

    public static function searchArticle(string $title): bool|array
    {
        try{
            $articles = Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId WHERE approuve= 1 AND articleTitle LIKE ?;", [$title]);
            return Tag::linkTagsWithArticles($articles);

        }catch (Exception $e) {return false;}
    }
*/

?>