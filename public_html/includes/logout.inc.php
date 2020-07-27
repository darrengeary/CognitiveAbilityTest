<?php
session_start();
	unset($_SESSION['u_uid']);
	session_unset();
	session_destroy();
	header("Location: /CognitiveAbilityTesting/index.php");
	exit();

?>