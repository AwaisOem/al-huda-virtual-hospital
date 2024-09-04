<?php
$_SESSION['db']->connect();
$doctors = $_SESSION['db']->query(
    "SELECT username,full_name,pic_url,license_url,created_at FROM users WHERE user_role = 'doctor'"
);
$_SESSION['db']->disconnect();

require_once('views/dashboard_doctors_view.php');