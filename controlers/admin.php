<?php
$_SESSION['db']->connect();
$medicines = $_SESSION['db']->query('SELECT DISTINCT * FROM medicines');
$users = $_SESSION['db']->query('SELECT username,full_name,pic_url,license_url,created_at , user_role , medical_url FROM users');
$sql_for_orders = 'Select o.order_id , m.name , m.price, o.quantity , round(100 - ((o.price/(o.quantity * m.price))*100)) as discount , o.price as total, o.username , o.delivery_loc , o.status  from orders as o LEFT join medicines as m on o.medicine_id = m.id';

$orders = $_SESSION['db']->query($sql_for_orders);
$appointments = $_SESSION['db']->query("SELECT * , CONCAT(DATE_PART('day', age(end_time, CURRENT_TIMESTAMP)), ' days') as  time_left  FROM appointments");
$hospitals = $_SESSION['db']->query('SELECT * FROM hospitals');

$_SESSION['db']->disconnect();
// dd($hospitals);


require_once('views/dashboard_manage_view.php');