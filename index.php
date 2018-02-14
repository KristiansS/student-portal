<?php 
require("includes/base.php");
?>

<!DOCTYPE html>
<html lang="en">

<body>
<br><br><br>
<div class="center-div">
<form action="user_authenticate.php" method="post">
    
	<div class="imgcontainer">
	    <img src="img/person-flat.png" alt="Avatar" class="avatar">
	</div>
	
	<h2 class="login">Login</h2>
	

	    <label><b>Email</b></label><br>
		<input style="width:100%;"type="text" placeholder="Enter Email Address" name="email" required><br>
		
		<label><b>Password</b></label><br>
		<input style="width:100%;"type="password" placeholder="Enter Password" name="password" required><br>
		<p> <input type="checkbox" checked="checked"> Remember me </p>
		<button class="btn btn-primary" type="submit">Login</button>
		

	
</form>
</div>
<div class="center-div">
	<a href="forgot_password.php">Forgot Password?</a> <br>
	<a href="register.php">Create Account</a>
</div>
</body>
</html>		