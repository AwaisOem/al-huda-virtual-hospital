<?php

$_SESSION['db']->connect();
$medicines = $_SESSION['db']->query('SELECT DISTINCT * FROM medicines');
$_SESSION['db']->disconnect();
// dd($medicines);

require_once('views/dashboard_pharmacy_view.php');