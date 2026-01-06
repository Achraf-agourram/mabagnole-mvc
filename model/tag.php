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
        Database::request("SELECT * FROM tags;", []); //fix
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