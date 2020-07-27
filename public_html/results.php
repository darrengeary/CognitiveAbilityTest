<?php
session_start();
  if (!isset($_SESSION["u_uid"]))
   {
      header("location: index.php");
   }
	include_once 'includes/db.inc.php';

	if (!isset($_POST['submit-quiz'])) {
		header("Location: quiz.php");
		exit();
	} else {
		if(empty($_POST['answerschecked'])) {
			header("Location: quiz.php?quiz=unchecked");
			exit();
		} else {
			$answerschecked = $_POST['answerschecked'];
			$correct = 0;
			$total = sizeof($answerschecked);
			$userid = $_SESSION["u_uid"];
			$age = $_SESSION["u_age"];

			foreach($answerschecked as $answerchecked) {
				list($qid, $aid) = explode(":", $answerchecked);
				$sql = "SELECT * FROM questions WHERE qid='$qid' AND aid='$aid';";
				$result = mysqli_query($conn, $sql); 
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck == 1) {
					$correct++;
				}
			}

			if($age >= 20 and $age <= 30) {
				if($correct < 5) {
					$usermsg = "Sever Cognitive Impairment";
				} elseif ($correct < 10) {
					$usermsg = "Mild Cognitive Impairment";
				} elseif ($correct < 13) {
					$usermsg = "Abnormal for Young Adult";
				} else {
					$usermsg = "Well Done, You Scored Very Well";
				}
			} elseif ($age >= 31 and $age <= 40) {
				if($correct < 5) {
					$usermsg = "Sever Cognitive Impairment";
				} elseif ($correct < 10) {
					$usermsg = "Increased Odds of Dementia";
				} elseif ($correct < 14) {
					$usermsg = "Abnormal for Adult";
				} else {
					$usermsg = "Well Done, You Scored Very Well";			
				}
			} elseif ($age >= 41 and $age <= 60) {
				if($correct < 4) {
					$usermsg = "Sever Cognitive Impairment";
				} elseif ($correct < 9) {
					$usermsg = "Increased Odds of Dementia";
				} elseif ($correct < 12) {
					$usermsg = "Abnormal for Middle-Aged Person";
				} else {
					$usermsg = "Well Done, You Scored Very Well";
				}
			} elseif ($age >= 61 and $age <= 80) {
				if($correct < 4) {
					$usermsg = "Cognitive Impairment Likely";
				} elseif ($correct < 7) {
					$usermsg = "Increased Odds of Dementia";
				} elseif ($correct < 10) {
					$usermsg = "Abnormal for Elderly Person";
				} else {
					$usermsg = "Well Done, You Scored Very Well";	
				}
			} elseif ($age > 80) {
				if($correct < 3) {
					$usermsg = "Cognitive Impairment Likely";
				} elseif ($correct < 6) {
					$usermsg = "Increased Odds of Dementia";
				} elseif ($correct < 10) {
					$usermsg = "Well Done, You scored Very Well";
				} else {
					$usermsg = "No Cognitive Impairement";			
				}
			}
			

			$sql = "SELECT max(attempt_id) as max_attempt_id FROM scores WHERE user_id='$userid';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck == 1) {
				$data = mysqli_fetch_assoc($result);
				$new_attempt_id = $data['max_attempt_id'] + 1;
			} else {
				$new_attempt_id = 1;
			}

			$sql = "INSERT INTO scores (user_id, attempt_id, score) VALUES ('$userid', '$new_attempt_id', '$correct');";
			mysqli_query($conn, $sql);
		}


	}

?>
<?php include 'includes/overall/overallheader.php'; ?>
  
<!-- start banner Area -->
<section class="about-banner">
<div class="container">				
<div class="row d-flex align-items-center justify-content-center">
<div class="about-content col-lg-12">
<h1 class="text-white">
Results				
</h1>
<p class="text-white link-nav"><a>Results Below</a></p>	
</div>	
</div>
</div>
</section>
<!-- End banner Area -->
<dir class="container">
	<div class="m-auto d-block text-center col-md-6">
		<br><br>
		<div class="alert alert-success" role="alert">
			  <h4 class="alert-heading">Your Results</h4>
			  <hr>
			  <p class="mb-0">Your score is : <?php echo $correct; ?> out of 10</p>
			  <br>
			  <p class="mb-0">Interpretation : <?php echo $usermsg; ?></p>
		</div>
		<br><br>
		<a href="userhome.php">Go Back</a>
	</div>
</dir>


<?php include 'includes/overall/overallfooter.php'; ?>

</html>