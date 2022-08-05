<?php

  include 'config.php';
  session_start();
  error_reporting(0);

  if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $email_id = $_POST['email_id'];
    $usn = $_POST['usn'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
  }

  if(isset($_SESSION['user_name'])){
    header("Location: welcome.html");
  }

  if($usn != ""){
    if($password == $cpassword){

      $query = "SELECT user_name from users WHERE email_id = '$email_id' OR usn='$usn'";
      $result = mysqli_query($conn,$query);
  
      if(!(mysqli_num_rows($result) > 0)){
        $query = "INSERT INTO users (usn,user_name,email_id,password)
                VALUES ('$usn','$user_name','$email_id','$password')";
        $result = mysqli_query($conn,$query);
        if($result){
          echo "<script>alert('Hurray!, Registration Successful')</script>";
          $user_name = "";
          $usn = "";
          $email_id = "";
          $_POST['password'] = "";
          $_POST['cpassword'] = "";
        }
        else{
          echo "<script>alert('Woops!, Something went wrong)</script>";
        }
      }
      else{
        echo "<script>alert('User already exists')</script>";
      }
    }
    else{
      echo "<script>alert(\"Password doesn\'t match\")</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Register</title>

  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
		<form action="" method="POST" class="register-form">
      
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			
      <div class="input-group">
				<input type="text" placeholder="Username" name="user_name" value="<?php echo $user_name; ?>" required>
			</div>
			
      <div class="input-group">
        <input type="text" placeholder="USN" name="usn" value="<?php echo $usn; ?>" required>
      </div>

      <div class="input-group">
				<input type="email" placeholder="Email" name="email_id" value="<?php echo $email_id; ?>" required>
			</div>

			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>