<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
require_once '../load.php';


// instantiate database and movie object
    $db       = Database::getInstance()->getConnection();

// initialize object
// $products = new Products($db);
$users = new Users($db);

// query movies
if (isset($_GET['id'])) {
    $stmt = $users->getUsersByID($_GET['id']);
}

$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // movies array
    $results = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $single_user = $row;
        $results[]    = $single_user;
    }

    //TODO:chat about JSON_PRETTY_PRINT vs not
    echo json_encode($results, JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array(
            "message" => "No Users found.",
        )
    );
}
