<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate product object
include_once '../objects/product.php';
  
$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->food_name) &&
    !empty($data->restaurant_name) &&
    !empty($data->category_id) &&
    !empty($data->category_name)&&
    !empty($data->description)&&
    !empty($data->photo)&&
    !empty($data->user_id)&&
    !empty($data->username)
){
  
    // set product property values
    $product->food_name = $data->food_name;
    $product->restaurant_name = $data->restaurant_name;
    $product->category_id = $data->category_id;
    $product->category_name = $data->category_name;
    $product->description = $data->description;
    $product->photo = $data->photo;
    $product->user_id = $data->user_id;
    $product->username = $data->username;
  
    // create the product
    if($product->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Review was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create review."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create review. Data is incomplete."));
}
?>