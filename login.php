<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "logindbcreate.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>






<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  

<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
</head>
 
<body>
    
  <section class="sub-header">
  <nav>
      <a href="homepage.html"> <img src="https://i.postimg.cc/qRXHLvh4/Pngtree-coffee-logo-5898135.png"> </a>
	  
	  <div class="nav-links">
	  
	  <ul>
	  <li> <a href="homepage.html">HOME</a> </li>
	  <li> <a href="menu2.html">MENU</a> </li>
	  <li> <a href="login.php">LOGIN</a> </li>
	  <li> <a href="signup.php">SIGN UP</a> </li>
          <li> <a href="book1.php">BOOK NOW</a> </li>
	  <li> <a href="Contact.html">CONTACT</a> </li>
      <li> <a href="about us.html">ABOUT US</a> </li>
	  </ul>
	  
  </nav>



<style>   
    Body {  
      font-family: 'Raleway', sans-serif;  
      background-color: #EED8C0;  
    }  
    button {   
           background-color: #885341;   
           width: 100%;  
            color: black;   
            padding: 15px;   
            margin: 10px 0px;   
            border: none;   
            cursor: pointer;   
             }   
     form {   
            border: 3px solid #f1f1f1;   
        }   
     input[type=text], input[type=password] {   
            width: 100%;   
            margin: 8px 0;  
            padding: 12px 20px;   
            display: inline-block;   
            border: 2px solid black;   
            box-sizing: border-box;   
        }  
     button:hover {   
            opacity: 0.7;   
        }   
      .cancelbtn {   
            width: auto;   
            padding: 10px 18px;  
            margin: 10px 5px;  
        }   
            
         
     .container {   
            padding: 25px;   
        
            opacity: 0.6;  
        }   
    </style> 
</head>    
<body>    
    <center> <h1> Customer Login </h1> </center>      
     <div class="container">   
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <form>  
        
    
    <div class="form-group">Username :   
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span> 
    </div>
    <div class="form-group">Password :
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
    </div>
                <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div> 
            
            <input type="checkbox" checked="checked"> Remember me   
            <button type="button" class="cancelbtn"> Cancel</button>   
           
        </div>   
    </form>     
</body>     
</html>  
