<?php

try {
    require_once(__DIR__ . '/../../config.php');

    if (
        isset($_POST['doctor_id'])
        && isset($_POST['days'])
        && isset($_SESSION['db'])
        && isset($_SESSION['user'])
        && $_SESSION['user']['user_role'] === 'patient'
    ) {
        $_SESSION['db']->connect();
        $days = $_POST['days'];
        $sql = "INSERT INTO appointments (doctor_id, end_time, patient_id) VALUES (:doctor_id, current_date + :interval::interval, :patient_id)";
        $params = [
            'doctor_id' => $_POST['doctor_id'],
            'interval' => $days . ' days',
            'patient_id' => $_SESSION['user']['username']
        ];
        if ($_SESSION['db']->is_connected() && $_SESSION['db']->query($sql, $params)) {
            header('HTTP/1.1 200 OK');
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'success',
                'message' => "Your appoinment has been booked",
            ]);
            $_SESSION['db']->disconnect();
            exit;
        } else {
            $_SESSION['db']->disconnect();
            throw new Exception("Something wentt wrong");
        }
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
