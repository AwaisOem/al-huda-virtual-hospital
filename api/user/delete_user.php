<?php

try {
require_once(__DIR__ . '/../../config.php');

    if (isset($_POST['id']) && isset($_SESSION['db']) && $_SESSION['user']['user_role'] == 'admin') {
        $_SESSION['db']->connect();
        if ($_SESSION['db']->is_connected() && $_SESSION['db']->query("DELETE FROM users WHERE username = ?",[$_POST['id']]))
        {
            header('HTTP/1.1 200 OK');
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'success',
                'message' => 'Deleted successfully'
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
