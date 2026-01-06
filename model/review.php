<?php

class Review
{
    private $reviewId;
    private $stars;
    private $reviewComment;
    private $idVehicle;
    private $idUser;

    public function __construct(int $id, int $stars, string $comment, int $idVehicle, int $idUser)
    {
        $this->reviewId = $id;
        $this->stars = $stars;
        $this->reviewComment = $comment;
        $this->idVehicle = $idVehicle;
        $this->idUser = $idUser;
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