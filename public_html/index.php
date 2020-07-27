<?php 
include 'includes/overall/overallheader.php'; 

?>
<html>
<!-- start banner Area -->
<section class="about-banner">
<div class="container">				
<div class="row d-flex align-items-center justify-content-center">
<div class="about-content col-lg-12">
<h1 class="text-white">
Login			
</h1>
<p class="text-white link-nav"><a>Please Login</a></p>	
</div>	
</div>
</div>
</section>
<!-- End banner Area -->
<section>
<div class = "loginborder regcontainer">
		<br><br>
			<div class="card-header">
			<?php
				$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

				if (strpos($fullUrl, "login=empty") == true){
				echo "<div class = 'container'><b>You did not fill in all fields!</b></div>";
				}
				elseif (strpos($fullUrl, "login=invalid") == true){
				echo "<div class = 'container'><b>Invalid Details!</b></div>";
				}
				elseif (strpos($fullUrl, "login=error") == true){
				echo "<div class = 'container'><b>Error!</b></div>";
				}

			?>
				</div>	
						<br>
			<form action="includes/login.inc.php" method="POST">
					    	<div class="inputscontainer">
							  	<label for="username"><b>Username</b></label>
					      		<input type="text" class="form-control" name="userid">
							  	<label for="password"><b>Password</b></label>
					      		<input type="password" class="form-control" name="pwd">
					      	</div>

				<div class = "regcontainer">
					<button type="submit" name="submit-login" class= "registerbtn">Login</button>
				</div>
			</form>

  	  
				<div class="regcontainer signin">
					<p>Not a member? <a href="signup.php">Register</a></p>
				</div>
					    <br><br>

					</div>
		</div>
	</div>
</section>

<?php include 'includes/overall/overallfooter.php'; ?>

</html>