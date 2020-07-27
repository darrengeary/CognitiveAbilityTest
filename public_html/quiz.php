<?php  session_start();
 if (!isset($_SESSION["u_uid"]))
   {
      header("location: index.php");
   }
include 'includes/overall/overallheader.php'; 
?>

<section class="about-banner">
<div class="container">				
<div class="row d-flex align-items-center justify-content-center">
<div class="about-content col-lg-12">
<h1 class="text-white">
Assessment				
</h1>
<p class="text-white link-nav"><a>Please Complete the Test Below</a></p>	
</div>	
</div>
</div>
</section>
<!-- End banner Area -->

<section>
	<div class="container">
		<br>
		<div class="col-lg-8 m-auto d-block">
		<div style = "text-center" class = container>
			<b>You may use pen and paper for assistance, please refrain from using a calculator...</b><br><br>
		</div>

			<form action="results.php" method="POST">

				<?php 
					include_once 'includes/db.inc.php';

					$sql = "SELECT count(*) as total from questions";
					$results = mysqli_query($conn, $sql);
					$data = mysqli_fetch_assoc($results);

					$range = range(0, $data['total']);
					shuffle($range);
					$qids = array_slice($range, 0 , 10);

					$sql = "SELECT * FROM questions WHERE qid IN (".implode(',',$qids).");";
					$questions = mysqli_query($conn, $sql);

					while($question = mysqli_fetch_array($questions)) {
						?>
						<div class="card">
							<div class="card-body">
								<p class="card-text"><?php echo $question['question'];?></p>
						<?php
							$qid = $question['qid'];
							$sql = "SELECT * FROM answers WHERE qid='$qid'";
							$answers = mysqli_query($conn, $sql);

							while($answer = mysqli_fetch_array($answers)) {
						?>
								<input type="radio" name="answerschecked[<?php echo $answer['qid']; ?>]" value="<?php echo $qid.":".$answer['aid']; ?>">
								<?php echo $answer['answer']; ?> &nbsp; &nbsp; &nbsp; 

							<?php } ?>
							</div>
						</div>
						<br>
				<?php } ?>

				<div class="m-auto d-block text-center">
					<input type="submit" class="btn btn-primary" name="submit-quiz">
				</div>
				<br>
				<br>
			    <?php
				    if(isset($_GET['quiz'])) {
						echo '<div class="alert alert-danger" role="alert">
								  Error : ' . $_GET['quiz'] . '</div>';
					}
				?>
				<br><br>
			</form>
		</div>
	</div>
</section>

<?php include 'includes/overall/overallfooter.php'; ?>

</html>
