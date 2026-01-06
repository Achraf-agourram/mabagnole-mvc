<?php

class Theme
{
    private $themeId;
    private $themeTitle;
    private $themeImage;

    public function __construct(int $id, string $title, string $image)
    {
        $this->themeId = $id;
        $this->themeTitle = $title;
        $this->themeImage = $image;
    }

    public static function addTheme(string $title, string $image): void
    {
        Database::request("INSERT INTO themes (themeTitle, themeImage) VALUES (?, ?);", [$title, $image]);
    }

    public function editTheme(string $title, string $image): void
    {
        Database::request("UPDATE SET themeTitle= ?, themeImage= ? FROM themes WHERE themeId= ?;", [$title, $image, $this->themeId]);
    }

    public function removeTheme(): void
    {
        Database::request("DELETE FROM themes WHERE themeId= ?;", [$title, $image, $this->themeId]);
    }

    public static function getThemes(): array
    {
        Database::request("SELECT * FROM themes;", []);
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