<?php
include_once './core/config/database.php';

class Role{
    private $id;
    private $title;


    public function __construct(){
    }

    public function gettitle() {
        return $this->title;
    }

    public function getId() {
        return $this->id;
    }

    public function getName(){
        return $this->title;
    }

    public function setName($title){
        $this->title = $title;
    }

    public function findByName($title) {
        $cnx = (new Database())->connect();

        $query = "SELECT * FROM role WHERE title = '" . $title . "'";

        $stmt = $cnx->prepare($query);

        $stmt->execute();

        return $stmt->fetchObject(__CLASS__); 
    }

    public function findById($id) {
        $cnx = (new Database())->connect();

        $query = "SELECT * FROM roles WHERE id =" . $id;

        $stmt = $cnx->prepare($query);

        $stmt->execute();

        return $stmt->fetchObject(__CLASS__); 
    }
}