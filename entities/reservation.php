<?php

class Reservation{
    private $id;
    private $reserveBegain;
    private $reserveEnd;
    private StatusLivre $statusLivre;
    private Livre $Livre;

    public function __construct($id = null, $reserveBegain, $reserveEnd,StatusLivre $statusLivre, array $Livre = [])
    {
        $this->id = $id;
        $this->reserveBegain = $reserveBegain;
        $this->reserveEnd = $reserveEnd;
        $this->statusLivre = $statusLivre;
        $this->Livre = $Livre;
    }
    

    public function getId(){
        return $this->id;
    }

    public function getResereBegain(){
        return $this->reserveBegain;
    }

    public function getReserveEnd(){
        return $this->reserveEnd;
    }

    public function getStatusLivre(){
        return $this->statusLivre;
    }

    public function getLivre(){
        return $this->Livre;
    }





    public function setId($id){
        return $this->id = $id;
    }

    public function setReserveBegain($reserveBegain){
        return $this->reserveBegain = $reserveBegain;
    }

    public function serReserveEnd($reserveEnd){
        return $this->reserveEnd = $reserveEnd;
    }

    public function setStatusLivre (StatusLivre$statusLivre){
        return $this->statusLivre = $statusLivre;
    }

    public function setLivre(array $Livre){
        return $this->Livre = $Livre;
    }
}

?>