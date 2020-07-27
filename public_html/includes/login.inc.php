<?php

session_start();

if (isset($_POST['submit-login'])) {
	
	include_once 'db.inc.php';

	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$pwd = md5($pwd);

	if (empty($userid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_id='$userid' AND user_password='$pwd';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck != 1) {
			header("Location: ../index.php?login=invalid");
			exit();
		} elseif ($row = mysqli_fetch_assoc($result)) {
			$_SESSION['u_uid'] = $row['user_id'];
			$_SESSION['u_age'] = $row['user_age'];
			header("Location: ../userhome.php?login=success");
			exit();
		} else {
			header("Location: ../index.php?login=error");
			exit();
		}
	}


} else {
	header("Location: ../index.php");
	exit();
}