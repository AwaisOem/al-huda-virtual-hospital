<?php
$_SESSION['db']->connect();

$sql_for_orders_of_user = 'Select m.name , m.price, o.quantity , round(100 - ((o.price/(o.quantity * m.price))*100)) as discount , o.price as total , o.delivery_loc , o.status  from orders as o LEFT join medicines as m on o.medicine_id = m.id where o.username = :username';

$sql_for_ap_of_user = "SELECT ap.doctor_id , ap.start_time , ap.end_time ,CONCAT(DATE_PART('day', age(ap.end_time, CURRENT_TIMESTAMP)), ' days') as  time_left , u.full_name , u.pic_url , u.license_url , u.user_role FROM appointments AS ap LEFT JOIN users AS u ON u.username = ap.doctor_id WHERE ap.patient_id = :username AND ap.end_time > CURRENT_TIMESTAMP";

$user_orders = $_SESSION['db']->query($sql_for_orders_of_user,['username' => $_SESSION['user']['username']]);

$user_appointments = $_SESSION['db']->query($sql_for_ap_of_user,['username' => $_SESSION['user']['username']]);

$_SESSION['db']->disconnect();

require_once('views/dashboard_profile_view.php');