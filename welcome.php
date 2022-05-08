<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
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
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>    
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p> 
    <p>
        <?php
      
        if(isset($_POST['btnReport'])) {
            
            header("location: report.php");
        }
        if(isset($_POST['btnLogout'])) {
            header("location: logout.php");
        }
    ?>
      
    <form method="post">
        <input type="submit" name="btnReport"
                value="Produce today's reservations"/>
          
        <input type="submit" name="btnLogout"
                value="Log Out"/>
    </form>
    </p>
</body>
</html>