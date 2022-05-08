<?php
class booking {

  
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
 
  private $pdo; // PDO object
  private $stmt; // SQL statement
  public $error; // Error message
  function __construct()
  {
      try {
          $this->pdo = new PDO(
              "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
              DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
          ]
              )
              ;
        //  echo "DBWork1";
      }
      catch (Exception $ex) {
          exit($ex->getMessage());
      }
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    $this->pdo = null;
    $this->stmt = null;
  }

  // (C) SAVE booking

    //  Restrictions
    // @TODO - ADD RULES
    // Number of Bookings allowed
    // Book only [] days in advance
    // Opening hours /days off 

    // INSERT into Database
   
    //  $->setAttribute( PDO::ATTR_EMULATE_PREPARES, false ); 
   
    function save($date, $slot, $name, $email, $ppl)
    {
       // echo "DBWork2";
        try {

            $this->stmt = $this->pdo->prepare("INSERT INTO `bookings` (`bk_date`,`bk_slot`,`bk_name`,`bk_email`,`bk_ppl`) VALUES (?,?,?,?,?)");
          // echo "DBWork3";
            $this->stmt->execute([$date, $slot, $name, $email, $ppl]);
         //   echo "DBWork3";
        }
        catch (Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
        }
    }

    // (C3) EMAIL

  

  // (D) GET bookingS FOR THE DAY
  function getDay ($day="") {
    // (D1) DEFAULT TO TODAY
    if ($day=="") { $day = date("Y-m-d"); }

    // (D2) GET ENTRIES
    $this->stmt = $this->pdo->prepare("SELECT * FROM `bookings` WHERE `bk_date`=?");
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();
  }
}
 

define("DB_CHARSET", "utf8");
  define('DB_HOST', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');

//define('DB_NAME', 'bookinfo');

// (F) NEW booking OBJECT
$_bk = new booking();
//echo "DBWork4";


