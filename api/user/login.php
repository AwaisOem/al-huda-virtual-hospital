<?php
try{
require_once(__DIR__ . '/../../config.php');
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $_SESSION['db']->connect();
        if (isset($_SESSION['db']) && $_SESSION['db']->is_connected()) {
        $user_data = $_SESSION['db']->query(
            "SELECT username,full_name,pic_url,license_url,created_at , user_role , medical_url FROM users WHERE username = ? AND password = ?" ,
            [$_POST['username'] , $_POST['password']]);
            if($user_data){
                header('HTTP/1.1 200 OK');
                header('Content-Type: application/json');
                $_SESSION['user'] = $user_data[0];
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'user' => $user_data[0]
                ]);
                $_SESSION['db']->disconnect();
                exit;
            }
        }
        $_SESSION['db']->disconnect();
    }
    header('HTTP/1.1 404 Unauthorized');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid username or password'
    ]);
    exit;
}catch(Exception $e){
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
    exit;
}