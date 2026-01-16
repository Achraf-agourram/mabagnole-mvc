<?php

interface ThemeServiceInterface
{
    public function addTheme(string $title): void;

    public function editTheme(Theme $theme, string $title): void;

    public function removeTheme(Theme $theme): void;

    public function getThemes(): array;

    public function getThemeById($id): Theme;
}

?>