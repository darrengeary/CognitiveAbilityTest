<?php 
session_start();
  if (!isset($_SESSION["u_uid"]))
   {
      header("location: index.php");
   }
include_once "includes/overall/overallheader.php"; 
?>
  
<!-- start banner Area -->
<section class="about-banner">
<div class="container">				
<div class="row d-flex align-items-center justify-content-center">
<div class="about-content col-lg-12">
<h1 class="text-white">
Score Trend			
</h1>
<p class="text-white link-nav"><a>Your Previous Scores</a></p>	
</div>	
</div>
</div>
</section>
<!-- End banner Area -->
<section>
	<div class="container">
		<div id="chart-container">
			<br>
			<br>
			<b>The Following graph presents your results from previous assessments...</b><br><br>
			<canvas id="line-chart" width="1000" height="400"></canvas>
		</div>
		<br><br>
		<a href="userhome.php">Go Back</a>
		<br><br>
	</div>
</section>
<div class = "container">
	<a>
</div>


<?php include 'includes/overall/overallfooter.php'; ?>

</html>