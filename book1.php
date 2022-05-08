
<?php
// Include config file
require_once "bookdbcreate.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking</title>
<link rel="stylesheet" href="book1.css">
<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700,900" rel="stylesheet">
</head>
<body>
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
<?php
    // (A) PROCESS booking
    if (isset($_POST["date"])) {
      require "booking.php";
      if ($_bk->save($_POST["date"], $_POST["slot"], $_POST["name"],   $_POST["email"], $_POST["ppl"])) {
        echo "<div class='ok'>Reservation saved.</div>";
      } else { echo "<div class='err'>".$_bk->error."</div>"; }
    }
    ?>

<div class="container">
<div class="time">
<h2 class="heading">Opening Times</h2>
<h3 class="daysOpen">Monday-Friday</h3>

<p>9am - 10pm</p>

<h3 class="heading-days">Saturday and sunday</h3>

<p>11am - 9pm</p>

<hr>

<h4 class="phoneNo">Contact us through our contact page!</h4>
</div>

<div class="form">
<form id="bkForm" method="post" target="_self">
<h2 class="heading heading-yellow">Make a reservation</h2>

<div class="field">
<p>Your Name</p>
<input type="text" name="name" placeholder="Name"/>
</div>
<div class="field">
<p>Your email</p>
<input type="email" name="email" placeholder="Email"/>
</div>

<?php
  
      // $mindate = date("Y-m-d", strtotime("+2 days"));
      $mindate = date("Y-m-d");
      ?>
<div class="field">
<p>Date</p>
<input type="date"  name="date"> <? //required id ?>
</div>

<div class="field">
<p>Time</p>
<input type="time" name="slot">
</div>

<div class="field">
<p>Number of people</p>
<select name="ppl" id="#">
<option value="1">1 person</option>
<option value="2">2 people</option>
<option value="3">3 people</option>
<option value="4">4 people</option>
<option value="5">5 people</option>
</select>
</div>

<button class="button">Submit</button>
</form>
</div>
</div>


</body>
</html>
