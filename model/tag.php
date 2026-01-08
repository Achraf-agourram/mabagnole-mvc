<?php

class Tag
{
    private $tagId;
    private $tagTitle;

    public function __construct(int $id, string $tagTitle)
    {
        $this->tagId = $id;
        $this->tagTitle = $text;
    }

    public static function addTag($tagTitle): void
    {
        Database::request("INSERT INTO tags (tagTitle) VALUES (?)", [$tagTitle]);
    }
    
    public function editTag($tagTitle): void
    {
        Database::request("UPDATE SET tagTitle= ? FROM tags;", [$tagTitle, $this->tagId]);
    }

    public function removeTag(): void
    {
        Database::request("DELETE FROM tags WHERE tagId= ?;", [$this->tagId]);
    }

    public static function getTags(): array
    {
        return Database::request("SELECT * FROM tags;", []); //fix
    }

    public static function getTagsByArticle($articleId): array
    {
        return Database::request("SELECT tags.* FROM article_tag JOIN tags ON tag_id=tags.tagId WHERE article_id=?;", [$articleId]);
    }

    public static function existTag(string $tag): bool
    {
        if(Database::request("SELECT * FROM tags WHERE tagTitle= ?;", [$tag])) return true;
        return false;
    }

    public static function getTagId(string $tag): int
    {
        return Database::request("SELECT tagId FROM tags WHERE tagTitle= ?;", [$tag])[0]->tagId;
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