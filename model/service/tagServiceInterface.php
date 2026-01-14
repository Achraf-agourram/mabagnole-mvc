<?php

interface tagServiceInterface
{
    public function addTag(string $tagTitle): void;

    public function editTag(Tag $tag, $tagTitle): void;

    public function removeTag(Tag $tag): void;

    public function getTags(): array;

    public function getTagsByArticle(int $articleId): array;

    public function existTag(string $tag): bool;

    public function getTagId(string $tag): int;

    public function linkTagsWithArticles(array $articles): array;
}

?>