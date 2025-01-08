<?php

class StatusLivre
{

    private $id;
    private $title;
    private $reservation;

    public function __construct($id = null, $title,array $reservation = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->reservation = $reservation;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getReservation(){
        return $this->reservation;
    }



    public function setId($id)
    {
        return $this->id = $id;
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function setReservation($reservation){
        return $this->reservation = $reservation;
    }
}
