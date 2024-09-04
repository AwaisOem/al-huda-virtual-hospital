<?php
require_once('config.php');

if (isset($_SESSION['user'])) {
    // for authenticated users
    $router->get('/', function ($e) {
        require_once('./controlers/dashboard.php');
    });

    $router->get('/d', function ($e) {
        require_once('./controlers/dashboard.php');
    });
    $router->get('/pharmacy', function ($e) {
        require_once('./controlers/pharmacy.php');
    });
    $router->get('/doctors', function ($e) {
        require_once('./controlers/doctors.php');
    });
    $router->get('/hospitals', function ($e) {
        require_once('./controlers/hospitals.php');
    });
    $router->get('/cart', function ($e) {
        require_once('./controlers/cart.php');
    });
    $router->get('/profile', function ($e) {
        require_once('./controlers/profile.php');
    });
    $router->get('/vidcall', function ($e) {
        require_once('./controlers/video_call.php');
    });

    if ($_SESSION['user']['user_role'] === 'doctor') {
        $router->get('/patients', function ($e) {
            require_once('./controlers/patients.php');
        });
    }
    if ($_SESSION['user']['user_role'] === 'admin') {
        $router->get('/admin', function ($e) {
            require_once('./controlers/admin.php');
        });
    }

    // apply special condition for this
} else {
    $router->get('/', function ($e) {
        require('./controlers/auth.php');
    });
    $router->get('/auth', function ($e) {
        require('./controlers/auth.php');
    });
}
// global
// $router->get('/contact', function($e){
//     echo json_encode($_POST);
// });



$router->handleRequest($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));