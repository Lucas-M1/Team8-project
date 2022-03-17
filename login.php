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
	  <li> <a href="menu.html">MENU</a> </li>
	  <li> <a href="login.php">LOGIN</a> </li>
	  <li> <a href="signup.php">SIGN UP</a> </li>
          <li> <a href="">BOOK NOW</a> </li>
	  <li> <a href="">CONTACT</a> </li>
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
    <form>  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter your username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter your password" name="password" required>  
            <button type="submit">Login</button>   
            <input type="checkbox" checked="checked"> Remember me   
            <button type="button" class="cancelbtn"> Cancel</button>   
           
        </div>   
    </form>     
</body>     
</html>  
