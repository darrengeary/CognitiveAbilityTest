<?php include 'includes/overall/overallheader.php'; 

?>
  
<!-- start banner Area -->
<section class="about-banner">
<div class="container">				
<div class="row d-flex align-items-center justify-content-center">
<div class="about-content col-lg-12">
<h1 class="text-white">
Register			
</h1>
<p class="text-white link-nav"><a>Please Register below</a></p>	
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

			if (strpos($fullUrl, "signup=emptyfield") == true){
			echo "<div class = 'container'><b>You did not fill in all fields!</b></div>";
			}
			elseif (strpos($fullUrl, "signup=underage") == true){
			echo "<div class = 'container'><b>You must be atleast 15 years old!</b></div>";
			}
			elseif (strpos($fullUrl, "signup=passwordmismatch") == true){
			echo "<div class = 'container'><b>Passwords dont match!</b></div>";
			}
			elseif (strpos($fullUrl, "signup=agelong") == true){
			echo "<div class = 'container'><b>Invalid Age!</b></div>";
			}
			elseif (strpos($fullUrl, "signup=usernamelong") == true){
			echo "<div class = 'container'><b>Username Must be Less than 10 characters!</b></div>";
			}
			elseif (strpos($fullUrl, "signup=userexists") == true){
			echo "<div class = 'container'><b>User already Exists!</b></div>";
			}
			?>
				</div>
					<br>
					<form action="includes/signup.inc.php" method="POST">
					    <div class="inputscontainer">
							<label for="username"><b>Full Name</b></label>
					      	<input type="text" class="form-control" name="username">
							
							<label for="userid"><b>Username</b></label>
					   		<input type="text" class="form-control" name="userid">
							
							<label for="userage"><b>Age</b></label>
					   		<input type="number" class="form-control" name="userage">
							
						  	<label for="password"><b>Password</b></label>
					   		<input type="password" class="form-control" name="pwd1">
							
							<label for="password"><b>Confirm Password</b></label>
					   		<input type="password" class="form-control" name="pwd2">
					    </div>

				<div class = "regcontainer">
					<button type="submit" name="submit-signup" class= "registerbtn">Register</button>
				</div>
			</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/overall/overallfooter.php'; ?>

</html>