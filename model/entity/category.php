<?php

class Category
{
    private $categoryId;
    private $categoryName;
    private $categoryImage;

    public function __construct(int $id, string $name, string $image)
    {
        $this->categoryId = $id;
        $this->categoryName = $name;
        $this->categoryImage = $image;
    }

    public static function addCategory (string $name, string $image): void
    {
        Database::request("INSERT INTO `category` (categoryName, categoryImage) VALUES (?, ?)", [$name, $image]);
    }

    public function editCategory (string $name, string $image): void
    {
        Database::request("UPDATE `category` SET categoryName= ?, categoryImage= ? WHERE categoryId= ?;", [$name, $image, $this->categoryId]);
    }

    public function deleteVehicle (): void
    {
        Database::request("DELETE FROM `vehicles` WHERE categoryId= ?;", [$this->categoryId]);
    }

    public static function getCategories (): array
    {
        return Database::request("SELECT * FROM `category`;", []);
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