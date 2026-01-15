<?php

interface ArticleServiceInterface
{
    public function addArticle(string $title, string $image, ?array $tags, string $paragraph, int $idTheme, int $idClient): bool;

    public function editArticle(Article $article, string $title, string $image, ?array $tags, string $paragraph, int $idTheme, int $connectedUserId): bool;

    public function approuveArticle(Article $article): bool;

    public function removeArticle(Article $article, int $connectedUserId): bool;

    public function getArticleById(int $id);

    public function getAllArticles();

    public function getArticlesOnTheme(int $idTheme);

    public function getArticlesOnTag(int $idTag);

    public function searchArticle(string $title);
}

?>