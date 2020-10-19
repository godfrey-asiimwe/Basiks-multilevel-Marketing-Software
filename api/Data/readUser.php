<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
  
// instantiate database and user object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$user = new User($db);
  
// query products
$stmt = $user->read();

  
// check if more than 0 record found
if($stmt->num_rows >0){
  
    // products array
    $users_arr=array();
    $users_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch_assoc()){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $user_list=array(
            "id" => $id,
            "email" => $email,
            "password" => $password,
            "firstname" => $name
        );
  
        array_push($users_arr["records"], $user_list);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($users_arr);
}else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
