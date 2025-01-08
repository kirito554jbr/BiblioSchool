<?php

include_once './core/config/database.php';

class Tags
{
    private $conn;
    private $table = 'tag';

    private $id;
    private $title;
    private $Livres = [];

    public function __construct($title,$db)
    {

        $this->title = $title;
        $this->conn = $db;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getLivre()
    {
        return $this->Livres;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }
    public function setLivre($Livre)
    {
        return $this->Livres = $Livre;
    }


    public function create()
    {
        $this->conn->beginTransaction();

        $query = "INSERT INTO " . $this->table . " 
                (title) 
                VALUES (:title)";

        $stmt = $this->conn->prepare($query);

        // Clean and bind data
        $stmt->bindParam(':title', $this->title);


        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    
    public function read()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

// $database = new Database();
// $db = $database->connect();

// $test = new Tags("fear",$db);

// $test->create();

// $test->read();
//  var_dump($test->read());
