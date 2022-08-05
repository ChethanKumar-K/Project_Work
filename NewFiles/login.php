<?php

  include 'config.php';
  session_start();

  error_reporting(0);

  if(isset($_SESSION['user_name'])){
    header("Location: welcomed.php");
  }

  if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $usn = $_POST['usn'];
    $email_id = $_POST['email_id'];
    $password = md5($_POST['password']);

    if($usn != ""){
      $query = "SELECT * FROM users WHERE usn = '$usn' AND password='$password'";
      $result = mysqli_query($conn,$query);

      //   TO CHECK IF THE USER ALREADY EXISTS
      //    USES EMAIL AND USN TO DISTINGUISH DIFFERENTLY
      
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_name'] = $row['user_name'];
        header("Location: welcomed.php");
      }

      else{
        echo "<script>alert('Invalid password,Try again')</script>";
      }
    }
  }

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Login</title>

  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
		<form action="" method="POST" class="register-form">
      
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			
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
				<button name="submit" class="btn">Login</button>
			</div>
			
      <p class="login-register-text">Have an account? <a href="register.php">Register Here.</a></p>
		</form>
	</div>
</body>
</html>
