<?php

class Theme
{
    private $themeId;
    private $themeTitle;

    public function __construct(int $id, string $title)
    {
        $this->themeId = $id;
        $this->themeTitle = $title;
    }

    public static function addTheme(string $title): void
    {
        Database::request("INSERT INTO themes (themeTitle) VALUES (?);", [$title]);
    }

    public function editTheme(string $title): void
    {
        Database::request("UPDATE SET themeTitle= ? FROM themes WHERE themeId= ?;", [$title, $this->themeId]);
    }

    public function removeTheme(): void
    {
        Database::request("DELETE FROM themes WHERE themeId= ?;", [$this->themeId]);
    }

    public static function getThemes(): array
    {
        return Database::request("SELECT * FROM themes;", []);
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