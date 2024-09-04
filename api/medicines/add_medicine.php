<?php
try {
    require_once(__DIR__ . '/../../config.php');

    if (isset($_POST['name']) 
    && isset($_POST['manufacturer']) 
    && isset($_POST['quantity']) 
    && isset($_POST['price']) 
    && isset($_POST['pic_url'])  
    && isset($_SESSION['db'])
    && $_SESSION['user']['user_role'] == 'admin') {

        $_SESSION['db']->connect();
        if ($_SESSION['db']->is_connected()) {
            if ($_SESSION['db']->query(
                "INSERT INTO medicines (name,manufacturer, price , quantity , pic_url) VALUES (:name , :manufacturer , :price , :quantity , :pic_url)",
                [
                    "name" => $_POST['name'],                   
                    "manufacturer"=> $_POST['manufacturer'],
                    "price"=> $_POST['price'],
                    "quantity"=> $_POST['quantity'],
                    "pic_url"=> $_POST['pic_url']
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
