<?php
include 'dbConfig.php';
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.html");
    exit;
}

// Define variables and initialize with empty values
$abNumber = $password = $userType = $newpassword = "";
$abNumber_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["abNumber"]))){
        $username_err = "Please enter your AB Number.";
    } else{
        $abNumber = trim($_POST["abNumber"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

	$newpassword = hash("sha256", $password);
    
    // Validate credentials
    if(empty($abNumber_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT staffId, abNumber, userType, password FROM staff WHERE abNumber = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_abNumber);
            
            // Set parameters
            $param_abNumber = $abNumber;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $staffId, $abNumber, $userType, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($newpassword == $hashed_password){
							//$row = mysqli_fetch_assoc($stmt);
                            // Password is correct, so start a new session
                            session_start();
							$_SESSION["loggedin"] = true;
							$_SESSION["abNumber"] = $abNumber;
							$_SESSION["staffId"] = $staffId;
							$_SESSION["userType"] = $userType;
                            
                            // Store data in session variables
                            //$_SESSION["loggedin"] = $sessionId;
                            // $_SESSION["sessionId"] = $sessionId;
							// $_SESSION["full_name"] = $full_name;
                            //$_SESSION["email_address"] = $email_address;                            
                            
                            // Redirect user to welcome page
                            header("location: index.html");
                        } else{
                            // Password is not valid, display a generic error message
                            echo "Invalid Password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    echo "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    //mysqli_close($db);
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  
    <link rel="stylesheet" href="signin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">
Login Form</div>
<div class="title signup">
Signup Form</div>
</div>
<div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab">
</div>
</div>
<div class="form-inner">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off" class="login">
            <div class="field">
              <input type="text" placeholder="AB Number" name="abNumber" required>
            </div>
<div class="field">
              <input type="password" placeholder="Password" name="password" required>
            </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
<div class="field btn">
              <div class="btn-layer">
</div>
<input type="submit" value="Login" name="login">
            </div>
<div class="signup-link">
Not a member? <a href="">Signup now</a></div>
</form>
<form action="#" class="signup">
            <div class="field">
              <input type="text" placeholder="Email Address" required>
            </div>
<div class="field">
              <input type="password" placeholder="Password" required>
            </div>
<div class="field">
              <input type="password" placeholder="Confirm password" required>
            </div>
<div class="field btn">
              <div class="btn-layer">
</div>
<input type="submit" value="Signup">
            </div>
</form>
</div>
</div>
</div>
<script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>

  </body>
</html>
