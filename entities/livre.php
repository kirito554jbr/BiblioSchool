<?php


include_once './core/config/database.php';







//     public function create (){
//         $query = "INSERT INTO" . $this->table . "(title, autheur, price, quantiter) VALUES (:title, :autheur, :price, :quantiter)";
//         $stmt = $this->conn->prepare($query);
//         $stmt->bindParam(':title', $this->title);
//         $stmt->bindParam(':autheur', $this->autheur);
//         $stmt->bindParam(':price', $this->price);
//         $stmt->bindParam(':quantiter', $this->quantiter);
//         return $stmt->execute();
//     }

//     public function read(){
//         $query = "SELECT * FROM" . $THIS->
//     }
// }


class Livre
{

    private $conn;
    private $table = 'Livre';

    private $id;
    private $title;
    private $autheur;
    private $price;
    private $quantiter;
    private Tags $tags;
    private Catégories $catégories;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAutheur()
    {
        return $this->autheur;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantiter()
    {
        return $this->quantiter;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getCategories()
    {
        return $this->catégories;
    }

    // Setters with method chaining
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function setAutheur($autheur)
    {
        return $this->autheur = $autheur;
    }

    public function setPrice($price)
    {
        return $this->price = $price;
    }

    public function setQuantiter($quantiter)
    {
        return $this->quantiter = $quantiter;
    }

    public function setTags(Tags $tags)
    {
        return $this->tags = $tags;
    }

    public function setCategories(Catégories $catégories)
    {
        return $this->catégories = $catégories;
    }

    // // Array manipulation methods
    // public function addTag($tag) {
    //     if (!in_array($tag, $this->tags)) {
    //         $this->tags[] = $tag;
    //     }
    //     return $this;
    // }

    // public function removeTag($tag) {
    //     $this->tags = array_filter($this->tags, function($t) use ($tag) {
    //         return $t !== $tag;
    //     });
    //     return $this;
    // }

    // public function addCategory($category) {
    //     if (!in_array($category, $this->categories)) {
    //         $this->categories[] = $category;
    //     }
    //     return $this;
    // }

    // public function removeCategory($category) {
    //     $this->categories = array_filter($this->categories, function($c) use ($category) {
    //         return $c !== $category;
    //     });
    //     return $this;
    // }

    // CRUD Operations
    public function create()
    {
        $this->conn->beginTransaction();

        $query = "INSERT INTO " . $this->table . " 
                (title, autheur, price, quantiter) 
                VALUES (:title, :autheur, :price, :quantiter)";

        $stmt = $this->conn->prepare($query);

        // Clean and bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':autheur', $this->autheur);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':quantiter', $this->quantiter);

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

    // public function readOne()
    // {
    //     $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(':id', $this->id);
    //     $stmt->execute();

    //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //     if ($row) {
    //         $this->title = $row['title'];
    //         $this->autheur = $row['autheur'];
    //         $this->price = $row['price'];
    //         $this->quantiter = $row['quantiter'];
    //         return true;
    //     }
    //     return false;
    // }

    // public function update()
    // {
    //     $query = "UPDATE " . $this->table . "
    //             SET title = :title,
    //                 autheur = :autheur,
    //                 price = :price,
    //                 quantiter = :quantiter
    //             WHERE id = :id";

    //     $stmt = $this->conn->prepare($query);

    //     // Clean and bind data
    //     $stmt->bindParam(':id', $this->id);
    //     $stmt->bindParam(':title', htmlspecialchars($this->title));
    //     $stmt->bindParam(':autheur', htmlspecialchars($this->autheur));
    //     $stmt->bindParam(':price', $this->price);
    //     $stmt->bindParam(':quantiter', $this->quantiter);

    //     return $stmt->execute();
    // }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    // // Search methods
    // public function searchByTitle($search)
    // {
    //     $query = "SELECT * FROM " . $this->table . " WHERE title LIKE :search";
    //     $stmt = $this->conn->prepare($query);
    //     $searchTerm = "%{$search}%";
    //     $stmt->bindParam(':search', $searchTerm);
    //     $stmt->execute();
    //     return $stmt;
    // }

    // public function searchByAuthor($search)
    // {
    //     $query = "SELECT * FROM " . $this->table . " WHERE autheur LIKE :search";
    //     $stmt = $this->conn->prepare($query);
    //     $searchTerm = "%{$search}%";
    //     $stmt->bindParam(':search', $searchTerm);
    //     $stmt->execute();
    //     return $stmt;
    // }
}
// $database = new Database();
// $db = $database->connect();
// $livre = new Livre($db);



// $livre->setTitle('newTitiel');
// $livre->setAutheur('newAutheur');
// $livre->setPrice('newPrice');
// $livre->setQuantiter('newQuantiter');




// $livre->create();

// var_dump($livre->read());
