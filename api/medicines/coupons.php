<?php
require_once(__DIR__ . '/../../config.php');

if(isset($_POST['coupon']) && $_POST['coupon'] != ''){
    $coupon = $_POST['coupon'];
    if(array_key_exists($coupon, $consts['coupons'])){
        header('Content-Type: application/json');
        header('HTTP/1.1 200 OK');
        echo json_encode([
            'status' => 'success',
            'message' => 'Coupon applied successfully',
            'discount' => $consts['coupons'][$coupon]
        ]);
        exit;
    }
}
header('Content-Type: application/json');
header('HTTP/1.1 404 Bad Request');
echo json_encode([
    'status' => 'error',
    'message' => 'Invalid coupon'
]);
