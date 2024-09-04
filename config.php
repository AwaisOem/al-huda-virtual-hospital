<?php
require_once('core/functions.php');
require_once('core/DB.php');
$consts = require_once('core/constants.php');
require_once('core/Router.php');
require_once('core/User.php');


// user configuration
session_start();
// DB configuration
$_SESSION['db'] = new DB($consts['dsn'], $consts['user'], $consts['password']);




// Routes configuration
$router = new Router();
