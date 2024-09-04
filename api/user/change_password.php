<?php
try{
require_once(__DIR__ . '/../../config.php');
    if (isset($_POST['oldpass']) && isset($_POST['newpass'])) {
        $_SESSION['db']->connect();
        if (isset($_SESSION['db']) && $_SESSION['db']->is_connected()) {
        $changed = $_SESSION['db']->query(
            "UPDATE users SET password = :newpass WHERE username = :username and password = :oldpass" ,
            [
                'username' => $_SESSION['user']['username'],
                'oldpass' => $_POST['oldpass'],
                'newpass' => $_POST['newpass']
            ]);
            if($changed){
                header('HTTP/1.1 200 OK');
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Password Changed successful',
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
        'message' => 'Invalid old password'
    ]);
    exit;
}catch(Exception $e){
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => "Something went wrong"
    ]);
    exit;
}
