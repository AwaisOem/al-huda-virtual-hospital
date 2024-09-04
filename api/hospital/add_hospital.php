<?php
try {
    require_once(__DIR__ . '/../../config.php');

    if (isset($_POST['name']) && 
        isset($_POST['emergency_number']) && 
        isset($_POST['loc'])  && 
        isset($_SESSION['db']) && 
        $_SESSION['user']['user_role'] == 'admin') {

        $_SESSION['db']->connect();
        if ($_SESSION['db']->is_connected()) {
            if ($_SESSION['db']->query(
                "INSERT INTO hospitals (name, loc, emergency_number) VALUES (:name , :loc , :emergency_number)",
                [
                    'name' => $_POST['name'],
                    'loc' => $_POST['loc'],
                    'emergency_number' => $_POST['emergency_number']
                ]
            )) {
                header('HTTP/1.1 200 OK');
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Upload successful',
                ]);
                $_SESSION['db']->disconnect();
            } else {
                $_SESSION['db']->disconnect();
                throw new Exception("Something went wrong");
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
