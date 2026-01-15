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