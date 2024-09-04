<?php
try {
    require_once(__DIR__ . '/../../config.php');

    if (
        isset($_POST['coupon'])
        && isset($_POST['items'])
        && isset($_POST['address'])
        && isset($_SESSION['db'])
    ) {
        $_SESSION['db']->connect();
        if ($_SESSION['db']->is_connected()) {

            $coupon = $_POST['coupon'];
            $items = json_decode($_POST['items']);
            $discount = $consts['coupons'][$coupon] ?? 0;

            foreach($items as $item){
                $medicine_id = $item->id;
                $quantity = intval($item->quantity);
                $medicine = $_SESSION['db']->query("SELECT * FROM medicines WHERE id = :id" , ["id" => $medicine_id]);
                if(count($medicine) == 0){
                    $_SESSION['db']->disconnect();
                    throw new Exception("Medicine not found");
                }
                if(intval($medicine[0]['quantity']) < $quantity){
                    $_SESSION['db']->disconnect();
                    throw new Exception("Medicine out of stock");
                }
                $total_price =  floatval($medicine[0]['price']) * $quantity;
                $total_price = $total_price - ($total_price * $discount / 100);


                $sql = "INSERT INTO orders (delivery_loc, medicine_id, quantity, price , status , username) VALUES 
                    (:delivery_loc, :medicine_id, :quantity, :price , 'pending', :username)";
                $params = [
                    "delivery_loc" => $_POST['address'],
                    "medicine_id" => intval($medicine_id),
                    "quantity" => intval($quantity),
                    "price" => floatval($total_price),
                    "username" => $_SESSION['user']['username']
                ];


                if ($_SESSION['db']->query($sql, $params)) {

                    $_SESSION['db']->query(
                        "UPDATE medicines SET quantity = quantity - :quantity WHERE id = :id", 
                    [
                        "quantity" => $quantity,
                        "id" => $medicine_id
                    ]);
                } else {
                    $_SESSION['db']->disconnect();
                    throw new Exception("Something wentt wrong");
                }
            }
            header('HTTP/1.1 200 OK');
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'success',
                'message' => 'Order Placed',
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
