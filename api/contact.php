<?php
require_once(__DIR__.'/../config.php');
// Start session
// Check if the necessary POST data is set
try{


    if(!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["message"])) {
        throw new Exception("Invalid request!");
    }

    // Validate email
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    throw new Exception("Invalid email!");
}

// Check name length
if(strlen($_POST["name"]) < 3) {
    throw new Exception("Name must be at least 3 characters long!");
}
}catch(Exception $e){
    header("HTTP/1.1 400 ".$e->getMessage());
    echo $e->getMessage();
    exit();
}

try {
    // Establish database connection
    $_SESSION["db"]->connect();

    if($_SESSION['db']->is_connected()){
        // Use prepared statement to prevent SQL injection
        $ex = $_SESSION["db"]->query("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)", [$_POST["name"], $_POST["email"], $_POST["message"] ]);

        // Check if the query was successful
        if ($ex) {
            // Set appropriate response headers
            header('Content-Type: application/json');
            echo json_encode("Your Message has been sent!");
        }else{
            header("HTTP/1.1 600 DB error");
            echo "Not Found";
        }
    }
} catch (Exception $e){
    header("HTTP/1.1 505 Server Error");
    echo $e->getMessage();
}
// Disconnect from the database
$_SESSION["db"]->disconnect();