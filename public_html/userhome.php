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

  	
<?php if (isset($_SESSION['u_uid'])) : ?>
	<h1 class="text-white">
	Home
	</h1>	
<p class="text-white link-nav" style="text-transform: uppercase" ><a>Welcome </a><strong><?php echo $_SESSION['u_uid'];?></strong></p>
</div>	
</div>
</div>
</section>
<?php else : ?>
	<h1 class="text-white">
	Home
	</h1>	
<p class="text-white link-nav"><a>Welcome</a></p>	
</div>	
</div>
</div>
</section>
<?php endif; ?>				

<!-- End banner Area -->
<section>
	<div class="container">
		<br><br>

		<div class="text-center">
			<div class="jumbotron">
		  		<h1 class="display-4">Welcome!</h1>
		  		<p class="lead">Please select from below options.</p>
		  		<hr class="my-4">
		  		<div class="row">
		  			<div class="col-md-2 offset-md-3">
						<form action="quiz.php" method="POST">
					      	<div class="form-group">
					      		<button type="submit" class="btn btn-primary" name="submit-quiz">Play Quiz</button>
					      	</div>
					    </form>
				    </div>
			    	<div class="col-md-2">
					    <form action="scores.php" method="POST">
					      	<div class="form-group">
					      		<button type="submit" class="btn btn-primary" name="submit-scores">View Scores</button>
					      	</div>
					    </form>
			    	</div>
			    	<div class="col-md-2">
					    <form action="chart.php" method="POST">
					      	<div class="form-group">
					      		<button type="submit" class="btn btn-primary" name="submit-chart">View Trend</button>
					      	</div>
					    </form>
			    	</div>
			    </div>
		  	</div>
		</div>
	</div>
</section>
</body>
</html>

<?php include 'includes/overall/overallfooter.php'; ?>