
<?php
	
	require 'dbconfig/config.php'; /* connectino to the database*/

?>

<!DOCTYPE html>
<html>
<head>
<title>login page</title>
<link rel="stylesheet" href="css/style.css"><!-- link to the style sheet-->
</head>

<body style="background-color:#dcdde1">

	<div id="main-warpper">
		<center>
			<h2>Login Form</h2>
			<!--<img src="imgs/avatar.png" class="image"> to upload a picture we want-->
		</center>


		<form class="myform" action= "home_page.php" method="POST">
			<label><b>Username:</b></label><br>
			<input name='username' type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
			<input name="login" type="submit" id="login_btn" value="login"/><br>
			<a href = "register.php"><input type="button" id="register_btn" value="Register"/>
			
				<!--<div id="reset">  to rest password took it out for now-->
		
			<!--<h2>Reset Form</h2>
			<img src="imgs/avatar.png" class="image">-->
		<!--</center>
		<form class= "myreset" action="index.php" method="post">
			<label><b>Password Reset:</b></label><br>
			<input type="Password" class="inputvalues" placeholder="Enter Password"><br>
			<input type="Password" class="inputvalues" placeholder="Reenter Password"><br>
			<input type="button" id="reset_btn" value="reset"><br>
		</div><br>-->

			
			
		</form>
		
		<?php
		if(isset($_POST['login']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$encrypted_password = md5($password);
			
			$query = "select * from users WHERE username = '$username' AND password = '$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				//valid
				$_SESSION['username'] = $username;
				header('location:index.php');	
			}	
			else
			{
				//invalid
				echo '<script type = "text/javascript"> alert("Invalid Credentials") </script>';
			}	
		}	
		
		
		?>
		
	</div>

</body>
</html>