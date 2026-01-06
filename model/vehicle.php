<?php

class Vehicle
{
    private $vehicleId;
    private $vehicleName;
    private $model;
    private $price;
    private $available;
    private $image;

    public function __construct(int $id, string $name, string $model, float $price, int $available, string $image)
    {
        $this->vehicleId = $id;
        $this->vehicleName = $name;
        $this->model = $model;
        $this->price = $price;
        $this->available = $available;
        $this->image = $image;
    }

    public static function addVehicle (string $name, string $model, float $price, string $image, int $category): void
    {
        Database::request("INSERT INTO `vehicles` (vehicleName, vehicleModel, vehiclePrice, vehicleImage, idCategory) VALUES (?, ?, ?, ?, ?)", [$name, $model, $price, $image, $category]);
    }

    public function editVehicle (string $name, string $model, float $price, int $available, string $image, int $category): void
    {
        Database::request("UPDATE `vehicles` SET vehicleName= ?, vehicleModel= ?, vehiclePrice= ?, available= ?, vehicleImage= ?, idCategory= ? WHERE vehicleId= ?;", [$name, $model, $price, $image, $category, $this->vehicleId]);
    }

    public function deleteVehicle (): void
    {
        Database::request("DELETE FROM `vehicles` WHERE vehicleId= ?;", [$this->vehicleId]);
    }

    public static function getVehicles (): array
    {
        return Database::request("SELECT * FROM `vehicles`;", []);
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