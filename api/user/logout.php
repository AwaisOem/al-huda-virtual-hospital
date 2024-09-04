<?php
try{
require_once(__DIR__ . '/../../config.php');
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success',
        'message' => 'Logout successful'
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