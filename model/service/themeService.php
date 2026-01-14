<?php

class ThemeService implements ThemeServiceInterface
{
    private ThemeRepository $themeRepository;

    public function __construct(ThemeRepository $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }

    public function addTheme(string $title): void
    {
        $this->themeRepository->insert($title);
    }

    public function editTheme(Theme $theme, string $title): void
    {
        $this->themeRepository->update($title, $theme->themeId);
    }

    public function removeTheme(Theme $theme): void
    {
        $this->themeRepository->remove($theme->themeId);
    }

    public function getThemes(): array
    {
        return $this->themeRepository->get();
    }

    public function getThemeById($id): Theme
    {
        $result = $this->themeRepository->findById($id);

        $theme = $result[0];

        return new Theme($theme->themeId, $theme->themeTitle);
    }
}
