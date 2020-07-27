<?php
session_start();

if (!isset($_SESSION['u_uid'])) {
	header("Location:index.php");
	exit();
}

header( "Content-type: application/json" );

include_once 'db.inc.php';

$user_id = $_SESSION['u_uid'];
$sql = "SELECT * FROM scores WHERE user_id='$user_id'";
$results = mysqli_query($conn, $sql);

$data = array();

foreach ($results as $row) {
	$data[] = $row;
}

echo json_encode($data);
