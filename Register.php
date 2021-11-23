
<?php
	//require 'dbconfig/config.php'; /* connectino to the database*/

?>

<DOTYPE html>
<html>
<head>
<title>Student Registraton page</title>
<link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color:#95a5a6">

	<div id="main-warpper">
		<center>
			<h2>Student Registraton Form</h2>
			<!--<img src="imgs/avatar.png" class="image">- to upload a picture we want-->
		</center>
	

		<form class= "myform" action="register.php" method="post"><!-- the form-->
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Username" required><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Password" required><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="confirm Password" required><br></br>
			<label><b>First Name</b></label><br>   
			<input name="first_name" type="text" class="inputvalues" placeholder="First Name" required><br>  
			<label><b>Middle_Name</b></label><br>   
			<input name="middle_name" type="text" class="inputvalues" placeholder="Middle Name"><br>
			<label><b>Last Name:</b></label><br>    
			<input name="last_name" type="text" class="inputvalues" placeholder="Last Name" required><br>   
			

		
			<label><b>Gender:</b></label><br> 
			<input type="radio" class="radiobtns" name="gender" value="Male" checked required> Male   
			<input type="radio" class="radiobtns" name="gender" value="Female" required> Female<br>   
			
			<label><b>Birthday<b></label><br>
			<input type="date" class="inputvalues" name="birthday"><br>
			
			<label><b>Phone</label><b><br>
			<input type="tel" class="inputvalues" name="phone" ><br>
		
			<label><b>Address:<b></label><br>  
			<textarea cols="50" rows="5" class="inputvalues" name="address" required>  
			</textarea><br>
		 
			<label><b>Email</b></label><br>  
			<input type="text" placeholder="Email" name="email" required><br>
			
		
		
		<label><b>Subject:</b></label><br> 
		<select class= "course" name="course">
			<option value="Course">Course</option>  
			<option value="Math">Math</option>  
			<option value="English">English</option>  
			<option value="science">Science</option>  
			<option value="Arts">Arts</option>  
			<option value="Music">Music</option>  
			<option value="Sports">Sports</option>  
		</select><br><br>
		
		<select class= "course1" name="course1">
			<option value="Course">Course</option>  
			<option value="Math">Math</option>  
			<option value="English">English</option>  
			<option value="science">Science</option>  
			<option value="Arts">Arts</option>  
			<option value="Music">Music</option>  
			<option value="Sports">Sports</option>  
		</select>  
		<!--<select>  
			<option value="Course">Course</option>  
			<option value="Math">Math</option>  
			<option value="English">English</option>  
			<option value="science">Science</option>  
			<option value="Arts">Arts</option>  
			<option value="Music">Music</option>  
			<option value="Sports">Sports</option>  
		</select>  
		<select>  
			<option value="Course">Course</option>  
			<option value="Math">Math</option>  
			<option value="English">English</option> 
			<option value="science">Science</option>  
			<option value="Arts">Arts</option>  
			<option value="Music">Music</option>  
			<option value="Sports">Sports</option>  
		</select>
		<select>  
			<option value="Course">Course</option>  
			<option value="Math">Math</option>  
			<option value="English">English</option>  
			<option value="science">Science</option>  
			<option value="Arts">Arts</option>  
			<option value="Music">Music</option>  
			<option value="Sports">Sports</option> 
		</select><br></br>
		
			<label><b>Parant Name</b></label><br>   
			<input type="text" class="inputvalues" placeholder="First Name"><br>   
			<label><b>Middle Name</b></label><br>   
			<input type="text" class="inputvalues" placeholder="Middle Name"><br>   
			<label><b>Last Name:</b></label><br>    
			<input type="text" class="inputvalues" placeholder="Last Name"><br></br>  
			<input type="text" name="area code" placeholder="area code"  value="" size="5">   
			<input type="text" name="phone" placeholder="phone no." size="10"/ required><br>
			<input type="text" name="Email" placeholder="Email" name="email" required><br>-->

			
			<input name="submit_btn" type="submit" id="signup_btn" value="sign up"/><br> </br>
			<a href="index.php"><input type="button" id="back_btn" value="back"/></a>

		
		<!--<label><b>Password Reset:</b></label><br>
			<input type="Password" class="inputvalues" placeholder="Enter Password"/><br>
			<input type="Password" class="inputvalues" placeholder="Reenter Password"/>
			<input type="button" id="reset_btn" value="password reset">-->
		
		
			
		</form>
		
		
		<?php /* checking password and login information */
			if(isset($_POST['submit_btn']))
			{
					//echo'<script type="text/javascript"> alert("sign up button clicked")</script>';-->
					
					$username 	= $_POST['username'];
					$password 	= $_POST['password'];
					$cpassword	= $_POST['cpassword'];
					$first_name = $_POST['first_name'];
					$middle_name = $_POST['middle_name'];
					$last_name 	= $_POST['last_name'];
					$gender 	= $_POST['gender'];
					$birthday 	= $_POST['birthday'];
					$phone		= $_POST['phone'];
					$address	= $_POST['address'];
					$email		= $_POST['email'];
					$course		= $_POST['course'];
					$course1	= $_POST['course1'];	
					
				if($password==$cpassword)
				{
					$encrypted_password = md5($password);
					
					$query = "select * from users WHERE username = '$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
					
						//there is already a user with the same username
						echo '<script type = "text/javascript"> alert("User already exists.. try again") </script>';
						
					}	
					{
						$query= "insert into users values('$username','$encrypted_password','$first_name','$middle_name','$last_name','$gender','$birthday','$phone','$address','$email','$course')";  //,,'date_of_Birth','phone','current_Address',email','course',)";
						$query_run = mysqli_query($con,$query);
					
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("user Registered. Go to login page")</script>';

						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!")</script>';
						}
					}
				}	
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not march!")</script>';	
				}
			}
		?>

	</div>		
	
	


</body>
</html>


</body>
</html>
