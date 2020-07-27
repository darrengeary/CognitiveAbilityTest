<?php 
session_start();
  if (!isset($_SESSION["u_uid"]))
   {
      header("location: index.php");
   }
include 'includes/overall/overallheader.php'; ?>
  
<!-- start banner Area -->
<section class="about-banner">
<div class="container">				
<div class="row d-flex align-items-center justify-content-center">
<div class="about-content col-lg-12">
<h1 class="text-white">
Scores Result				
</h1>
<p class="text-white link-nav"><a>Previous Scores</a></p>	
</div>	
</div>
</div>
</section>
<!-- End banner Area -->

<section>
	<div class="container">
		<br>
		<div class="col-lg-8 m-auto d-block">

			<table class="table">
				<thead>
				    <tr>
				    	<th scope="col">Attempt</th>
				    	<th scope="col">Score out of 10</th>
				    </tr>
				</thead>
				<tbody>
				<?php 
					include_once 'includes/db.inc.php';

					$user_id = $_SESSION["u_uid"];
					$sql = "SELECT * FROM scores WHERE user_id='$user_id'";
					$results = mysqli_query($conn, $sql);
						
					while($row = mysqli_fetch_array($results)) {
						?>
						<tr>
							<td><?php echo $row['attempt_id'];?></td>
							<td><?php echo $row['score'];?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br><br>
		<a href="userhome.php">Go Back</a>
		<br><br>
		</div>
	</div>
</section>
<?php include 'includes/overall/overallfooter.php'; ?>

</html>
