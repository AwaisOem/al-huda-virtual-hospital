<?php
$_SESSION['db']->connect();
$hospitals = $_SESSION['db']->query("SELECT DISTINCT * FROM hospitals");
$_SESSION['db']->disconnect();

require_once('views/dashboard_hospitals_view.php');