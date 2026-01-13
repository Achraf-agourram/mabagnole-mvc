<?php

class tagRepository
{
    public function insert (string $tagTitle): void
    {
        Database::request("INSERT INTO tags (tagTitle) VALUES (?)", [$tagTitle]);
    }

    public function update (string $title, int $id): void
    {
        Database::request("UPDATE SET tagTitle= ? FROM tags;", [$title, $id]);
    }

    public function remove (int $id): void
    {
        Database::request("DELETE FROM tags WHERE tagId= ?;", [$id]);
    }

    public function get ():array
    {
        return Database::request("SELECT * FROM tags;", []);
    }

    public function getByArticle (int $articleId): array
    {
        return Database::request("SELECT tags.* FROM article_tag JOIN tags ON tag_id=tags.tagId WHERE article_id=?;", [$articleId]);
    }

    public function exist (int $title): array
    {
        Database::request("SELECT * FROM tags WHERE tagTitle= ?;", [$title]);
    }

    public function getId (int $title): array
    {
        return Database::request("SELECT tagId FROM tags WHERE tagTitle= ?;", [$title]);
    }
}

?>