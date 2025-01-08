<?php

include './core/config/database.php';


class Utilisateur{

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private Role $role;
    private $id_role;


    public function __construct(){}


    public function getRole() {
        return $this->role;
    }

    public function setfirstName($firstName){
        $this->firstName = $firstName;
    }

    public function setAttributs($firstName,$lastName,$email, $password){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    public function setRole($role_name) {
        $role = new Role();

        $this->role = $role->findByName($role_name);
    }

    public function create() {
        $cnx = (new Database())->connect();

        $query = "INSERT INTO utilisateur (firstName, lastName, email, password, id_role) VALUES ( '" .$this->firstName . "' , '" .  $this->lastName . "' , '" . $this->email ."' , '" .  $this->password . "' , " .  $this->role->getId() . ");";

        $stmt = $cnx->prepare($query);


        $stmt->execute();
        $this->id = $cnx->lastInsertId();

    }


    public function update() {

        $cnx = (new Database())->connect();

        $query = "UPDATE utilisateur SET firstName ='" . $this->firstName . "' WHERE id=" . $this->id;
        $stmt = $cnx->prepare($query);


        $stmt->execute();

    }

    public function login($email, $password) {
        if ($email == null || empty($email) 
            || $password == null ||empty($password)) {
                return false;
        }

        $query = "SELECT * FROM utilisateur WHERE email = '" . $email ."' and password = '". $password . "'";

        $cnx = (new Database())->connect();

        $stmt = $cnx->prepare($query);

        $stmt->execute();

        return $stmt->fetchObject(__CLASS__);

    }

    public function mappRole() {
        $role = new Role();

        $role = $role->findById($this->id_role);

        $this->role = $role;
    }

}



?>