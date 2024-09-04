<?php
$_SESSION['db']->connect();
$sql_query_for_patients = "SELECT ap.patient_id , u.full_name   ,CONCAT(DATE_PART('day', age(ap.end_time, CURRENT_TIMESTAMP)), ' days') as  time_left , u.medical_url  , u.pic_url FROM appointments AS ap LEFT JOIN users AS u ON u.username = ap.patient_id WHERE ap.doctor_id = ? AND ap.end_time > CURRENT_TIMESTAMP";
$patients = $_SESSION['db']->query($sql_query_for_patients ,[$_SESSION['user']['username']] );
$_SESSION['db']->disconnect();

require_once('views/dashboard_patients_view.php');