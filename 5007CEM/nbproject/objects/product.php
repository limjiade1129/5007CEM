<?php
class Product{
  
    // database connection and table name
    private $conn;
    private $table_name = "review";
  
    // object properties
    public $id;
    public $food_name;
    public $restaurant_name;
    public $category_name;
    public $category_id;
    public $description;
    public $photo;
    public $user_id;
    public $username;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
// read products
function read(){
  
    // select all query
    $query = "SELECT
                c.category_name as category_name, r.id,r.food_name, r.restaurant_name, r.description, r.category_id, r.photo,r.user_id,r.username
            FROM
                " . $this->table_name . " r
                LEFT JOIN
                    categories c
                        ON r.category_id = c.category_id
            ORDER BY
                r.id ASC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
    
}

// create product
function create(){

    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                food_name=:food_name, restaurant_name=:restaurant_name, category_id=:category_id, category_name=:category_name, description=:description, photo=:photo,user_id=:user_id,username=:username";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->food_name=htmlspecialchars(strip_tags($this->food_name));
    $this->restaurant_name=htmlspecialchars(strip_tags($this->restaurant_name));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    $this->photo=htmlspecialchars(strip_tags($this->photo));
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
    $this->username=htmlspecialchars(strip_tags($this->username));

    // bind values
    $stmt->bindParam(":food_name", $this->food_name);
    $stmt->bindParam(":restaurant_name", $this->restaurant_name);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":category_name", $this->category_name);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":photo", $this->photo);
    $stmt->bindParam(":user_id", $this->user_id);
    $stmt->bindParam(":username", $this->username);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;
}

// used when filling up the update product form
function readOne(){
  
    // query to read single record
    $query = "SELECT
                c.category_name as category_name, r.id,r.food_name, r.restaurant_name, r.description, r.category_id, r.photo,r.user_id,r.username
            FROM
                " . $this->table_name . " r
                LEFT JOIN
                    categories c
                        ON r.category_id = c.category_id
            WHERE
                r.id = ?
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->food_name = $row['food_name'];
    $this->restaurant_name = $row['restaurant_name'];
    $this->category_id = $row['category_id'];
    $this->category_name = $row['category_name'];
    $this->description = $row['description'];
    $this->photo = $row['photo'];
    $this->user_id = $row['user_id'];
    $this->username = $row['username'];
}

// delete the product
function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

// search products
function search($keywords){
  
    // select all query
    $query = "SELECT
                c.category_name as category_name, r.id,r.food_name, r.restaurant_name, r.description, r.category_id, r.photo,r.user_id,r.username
            FROM
                " . $this->table_name . " r
                LEFT JOIN
                    categories c
                        ON r.category_id = c.category_id
            WHERE
                r.food_name LIKE ? OR r.restaurant_name LIKE ? OR c.category_name LIKE ?
            ORDER BY
                r.id ASC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
  
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}


}
?>