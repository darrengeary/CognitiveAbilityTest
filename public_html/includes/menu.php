<?php 
if (!isset($_SESSION['u_uid'])) : ?>
	 <nav id="nav-menu-container">
		<ul class="nav-menu">
		  <li><a href="userhome.php">Home</a></li>		  
		  <li><a href="about.php">About</a></li>
		  <li><a href="index.php">Login</a></li>
		  <li><a href="signup.php">Register</a></li>
		</ul>
	</nav>

	
<?php else : ?>
	<nav id="nav-menu-container">
		<ul class="nav-menu">
		  <li><a href="userhome.php">Home</a></li>
		  <li><a href="about.php">About</a></li>
		  <li><a href="quiz.php">Assessment</a></li>
		
		<li><div class="navdropdown">
			<a class="navdropbtn" >Results</a>
			<div class="navdropdown-content">
				<a href="chart.php?sub-chart='1'">Score Graph</a>
				<a href="scores.php">Score Table</a>
			</div>
		</div></li>
			
		  <li>|  </li>

			<li><div class="navdropdown">
				<a class="navdropbtn" style="color: grey;"><?php echo $_SESSION['u_uid']?>'s Account	˅</a>
				<div class="navdropdown-content">
					<form><a href="includes/logout.inc.php" style="color: red;">Logout</a></form>
				</div>
			</div></li>
		</ul>
	</nav>
<?php endif; ?>				
