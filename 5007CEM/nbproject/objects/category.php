<?php
class Category{
  
    // database connection and table name
    private $conn;
    private $table_name = "categories";
  
    // object properties
    public $category_id;
    public $category_name;
  
    public function __construct($db){
        $this->conn = $db;
    }
  
    // used by select drop-down list
    public function readAll(){
        //select all data
        $query = "SELECT
                    category_id, category_name, 
                FROM
                    " . $this->table_name . "
                ORDER BY
                    category_id";
  
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
  
        return $stmt;
    }
    
    // used by select drop-down list
public function read(){
  
    //select all data
    $query = "SELECT
                category_id, category_name
            FROM
                " . $this->table_name . "
            ORDER BY
                category_id";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
  
    return $stmt;
}
}
?>
