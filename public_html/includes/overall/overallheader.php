	<!DOCTYPE html>#
	<html lang="zxx" class="no-js">
	
<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php';
?>


<!DOCTYPE html>

	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<?php 
		if (isset($_POST['submit-chart'])) { 
			echo '<script type="text/javascript" src="js/app.js"></script>';
		}
		if (isset($_GET['sub-chart'])) { 
			echo '<script type="text/javascript" src="js/app.js"></script>';
		}
	?>
