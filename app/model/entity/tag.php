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