<?php
// echo json_encode($_POST);
try {
require_once(__DIR__ . '/../../config.php');

    if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])  && isset($_SESSION['db'])) {

        $_SESSION['db']->connect();

        if ($_SESSION['db']->is_connected()) {
        
            $sql_query_to_fetch_user = "SELECT username,full_name,pic_url,license_url,created_at , user_role , medical_url FROM users WHERE username = ?";
        
            $user_data = $_SESSION['db']->query($sql_query_to_fetch_user, [$_POST['username']]);
        
            if (count($user_data) == 0) {
        
                if ($_SESSION['db']->query(
                    "INSERT INTO users (username,full_name, user_role , password) VALUES (:username , :name , 'patient' , :password)",
                    [
                        'username' => $_POST['username'],
                        'name' => $_POST['name'],
                        'password' => $_POST['password']
                    ]
                )) {
        
                    $user_data = $_SESSION['db']->query($sql_query_to_fetch_user, [$_POST['username']]);
        
                    $_SESSION['user'] = $user_data[0];
        
                    header('HTTP/1.1 200 OK');
                    header('Content-Type: application/json');
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Signup successful',
                        'user' => $user_data[0]
                    ]);
                    $_SESSION['db']->disconnect();
                } else {
                    $_SESSION['db']->disconnect();
                    throw new Exception("Something went wrong");
                }
            } else {
                header('HTTP/1.1 404 Unauthorized');
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Username already exists'
                ]);
            }
            exit;
        }
        $_SESSION['db']->disconnect();
    }
    header('HTTP/1.1 404 Unauthorized');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid parameters'
    ]);
    exit;
} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
    exit;
}
