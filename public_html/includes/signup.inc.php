<?php

session_start();

if (isset($_POST['submit-signup'])) {
	
	include_once 'db.inc.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$age = mysqli_real_escape_string($conn, $_POST['userage']);
	$pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);
	$pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

	if (empty($userid) || empty($username) || empty($pwd1) || empty($age)) {
		header("Location: ../signup.php?signup=emptyfield");
		exit();
	} elseif ($age < 15) {
		header("Location: ../signup.php?signup=underage");
		exit();
	} elseif ($pwd1 != $pwd2) {
		header("Location: ../signup.php?signup=passwordmismatch");
		exit();
	} elseif (strlen($age) > 3) {
		header("Location: ../signup.php?signup=agelong");
		exit();
	} elseif (strlen($userid) > 10) {
		header("Location: ../signup.php?signup=usernamelong");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_id='$userid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0) {
			header("Location: ../signup.php?signup=userexists");
			exit();
		} else {
			$pwd = md5($pwd1);
			$sql = "INSERT INTO users (user_id, user_name, user_age, user_password) VALUES ('$userid', '$username', $age, '$pwd');";
			mysqli_query($conn, $sql);
			$_SESSION['u_uid'] = $userid;
			$_SESSION['u_age'] = $age;
			header("Location: ../userhome.php?signup=success");
			exit();
		}
	}


} else {
	header("Location: ../index.php");
	exit();
}