<?php

class ThemeRepository
{
    public function insert(string $title): void
    {
        Database::request("INSERT INTO themes (themeTitle) VALUES (?);", [$title]);
    }

    public function update(string $title, int $id): void
    {
        Database::request("UPDATE SET themeTitle= ? FROM themes WHERE themeId= ?;", [$title, $id]);
    }

    public function remove(int $id): void
    {
        Database::request("DELETE FROM themes WHERE themeId= ?;", [$id]);
    }

    public function get(): array
    {
        return Database::request("SELECT * FROM themes;", []);
    }

    public function findById(int $id): array
    {
        return Database::request("SELECT * FROM themes WHERE themeId= ?;", [$id]);
    }
}

?>