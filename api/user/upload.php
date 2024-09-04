<?php 
// header('HTTP/1.1 200 OK');
// header('Content-Type: application/json');
// echo json_encode($_POST);

try{
require_once(__DIR__ . '/../../config.php');

// image upload code
if (isset($_POST['action']) && $_POST['action'] == 'upload-image' ){    
        if(isset($_POST['image']) && $_SESSION['user']['username'] && isset($_SESSION['db'])){
            $_SESSION['db']->connect();
            if($_SESSION['db']->is_connected() && $_SESSION['db']->query(
                    "UPDATE users SET pic_url = :img_txt WHERE username = :username" ,
                    [
                        'username' => $_SESSION['user']['username'],
                        'img_txt' => $_POST['image']
                    ])){
                        header('HTTP/1.1 200 OK');
                        header('Content-Type: application/json');
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Picture Uploaded successful',
                    ]);
                    $_SESSION['user']['pic_url'] = $_POST['image']; 
                    $_SESSION['db']->disconnect();
                    exit;
                    }

            $_SESSION['db']->disconnect();
        }
        header('HTTP/1.1 404 Unauthorized');
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid Image Request'
        ]);
        exit;
}
// image upload code ends here
// medical record upload code
if (isset($_POST['action']) && $_POST['action'] == 'medical_url' ){    
    if(isset($_POST['med-url']) && $_SESSION['user']['username'] && isset($_SESSION['db'])){
        $_SESSION['db']->connect();
        if($_SESSION['db']->is_connected() && $_SESSION['db']->query(
                "UPDATE users SET medical_url = :med_txt WHERE username = :username" ,
                [
                    'username' => $_SESSION['user']['username'],
                    'med_txt' => $_POST['med-url']
                ])){
                    header('HTTP/1.1 200 OK');
                    header('Content-Type: application/json');
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Uploaded successful',
                ]);
                $_SESSION['user']['medical_url'] = $_POST['med-url']; 
                $_SESSION['db']->disconnect();
                exit;
                }

        $_SESSION['db']->disconnect();
    }
    header('HTTP/1.1 404 Unauthorized');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => 'InvalidRequest'
    ]);
    exit;
}
// medical record upload code ends here
// license upload code
if (isset($_POST['action']) && $_POST['action'] == 'license_url' ){    
    if(isset($_POST['license_url']) && $_SESSION['user']['username'] && isset($_SESSION['db'])){
        $_SESSION['db']->connect();
        if($_SESSION['db']->is_connected() && $_SESSION['db']->query(
                "UPDATE users SET license_url = :license_url WHERE username = :username" ,
                [
                    'username' => $_SESSION['user']['username'],
                    'license_url' => $_POST['license_url']
                ])){
                    header('HTTP/1.1 200 OK');
                    header('Content-Type: application/json');
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Uploaded successful',
                ]);
                $_SESSION['user']['license_url'] = $_POST['license_url']; 
                $_SESSION['db']->disconnect();
                exit;
                }

        $_SESSION['db']->disconnect();
    }
    header('HTTP/1.1 404 Unauthorized');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid Request'
    ]);
    exit;
}
// license upload code end

}catch(Exception $e){
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
    exit;
}