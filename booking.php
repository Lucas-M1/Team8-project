<?php
class booking {

  
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
 
  private $pdo; // PDO object
  private $stmt; // SQL statement
  public $error; // Error message
  function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USERNAME, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
        ]
        
      )
     // $this->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
      ;
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    $this->pdo = null;
    $this->stmt = null;
  }

  // (C) SAVE booking
  function save ($date, $slot, $name, $email, $ppl, $notes="") {
    // (C1) CHECKS & RESTRICTIONS
    // @TODO - ADD YOUR OWN RULES & REGULATIONS HERE
    // MAX # OF BOOKINGS ALLOWED?
    // USER CAN ONLY BOOK X DAYS IN ADVANCE?
    // USER CAN ONLY BOOK A MAX OF X SLOTS WITHIN Y DAYS?

    // (C2) DATABASE ENTRY
    try {
     // $mysql->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
      $this->stmt = $this->pdo->prepare(
        "INSERT INTO `bookinfo` (`bk_date`, `bk_slot`, `bk_name`, `bk_email`, `bk_ppl`,) VALUES (?,?,?,?,?)"
      );
     $this->stmt->bindParam(1, $bk_date,PDO::PARAM_STR);
     $this->stmt->bindParam(2, $bk_slot,PDO::PARAM_STR);
     $this->stmt->bindParam(3, $bk_name,PDO::PARAM_STR);
     $this->stmt->bindParam(4, $bk_email,PDO::PARAM_STR);
     $this->stmt->bindParam(5, $bk_ppl,PDO::PARAM_STR);

      $this->stmt->execute([$date, $slot, $name, $email, $ppl,]);
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }

    // (C3) EMAIL

    $subject = "Booking Received";
    $message = "Thank you, we have received your request and will process it shortly.";
    @mail($email, $subject, $message);
    return true;
  }

  // (D) GET bookingS FOR THE DAY
  function getDay ($day="") {
    // (D1) DEFAULT TO TODAY
    if ($day=="") { $day = date("Y-m-d"); }

    // (D2) GET ENTRIES
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `bookinfo` WHERE `bk_date`=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();
  }
}
 


  define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define("DB_CHARSET", "utf8");
define('DB_NAME', 'bookinfo');

// (F) NEW booking OBJECT
$_bk = new booking();


