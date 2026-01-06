<?php

class Appointment
{
    private $appointmentId;
    private $appointmentStartDate;
    private $appointmentEndDate;
    private $appointmentPlace;
    private $idVehicle;
    private $idUser;

    public function __construct(int $id, string $sDate, string $eDate, string $place, int $idVehicle, int $idUser)
    {
        $this->appointmentId = $id;
        $this->appointmentStartDate = $sDate;
        $this->appointmentEndDate = $eDate;
        $this->appointmentPlace = $place;
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