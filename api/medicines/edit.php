<?php
try {
    require_once(__DIR__ . '/../../config.php');

    if (isset($_POST['name']) 
    && isset($_POST['id']) 
    && isset($_POST['manufacturer']) 
    && isset($_POST['quantity']) 
    && isset($_POST['price']) 
    && isset($_POST['pic_url'])  
    && isset($_SESSION['db'])
    && $_SESSION['user']['user_role'] == 'admin') {

        $_SESSION['db']->connect();
        $query = "UPDATE medicines SET name = :name , manufacturer = :manufacturer , price = :price , quantity = :quantity , pic_url = :pic_url WHERE id = :id";
        $params = [
            'name' => $_POST['name'],
            'manufacturer' => $_POST['manufacturer'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity'],
            'pic_url' => $_POST['pic_url'],
            'id' => $_POST['id']
        ];
        if ($_SESSION['db']->is_connected() && $_SESSION['db']->query($query,$params)) {
                header('HTTP/1.1 200 OK');
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Update successful',
                ]);
                $_SESSION['db']->disconnect();
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
