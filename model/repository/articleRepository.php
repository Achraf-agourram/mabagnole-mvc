<?php

class ArticleRepository
{
    public function insert(string $title, string $image, ?array $tags, string $paragraph, int $idTheme, int $idClient): void
    {
        Database::request("INSERT INTO articles (articleTitle, articleImage, articleParagraph, approuve, idTheme, idClient) VALUES (?, ?, ?, ?, ?, ?);", [$title, $image, $paragraph, 0, $idTheme, $idClient]);
    }

    public function update(int $articleId, string $title, string $image, string $paragraph): void
    {
        Database::request("UPDATE articles SET articleTitle= ?, articleImage= ?, articleParagraph= ?, approuve= ? WHERE articleId= ?;", [$title, $image, $paragraph, 0, $articleId]);
    }

    public function remove(int $articleId): void
    {
        Database::request("DELETE FROM articles WHERE articleId= ?;", [$articleId]);
    }

    public function approuve(int $articleId): void
    {
        Database::request("UPDATE articles SET approuve= 1 WHERE articleId= ?;", [$articleId]);
    }

    public function findById(int $id): array
    {
        return Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId WHERE approuve= 1 AND articleId = ?;", [$id]);
    }

    public function getAll(): array
    {
        return Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId WHERE approuve= 1;", []);
    }

    public function getOnTheme(): array
    {
        return Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId WHERE approuve= 1 AND idTheme= ?;", [$idTheme]);
    }

    public function getOnTag(): array
    {
        return Database::request("SELECT article_id FROM `article_tag` WHERE tag_id= ?;", [$idTag]);
    }

    public function search($title): array
    {
        return Database::request("SELECT articles.*, themes.themeTitle FROM articles JOIN themes ON idTheme=themes.themeId WHERE approuve= 1 AND articleTitle LIKE ?;", [$title]);
    }
}

?>