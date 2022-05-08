<?php
// (A) GET ALL RESERVATIONS
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

define('DB_NAME', 'bookinfo');
require_once "booking.php";
$all = $_bk->getDay();

// (B) OUTPUT CSV
header("Content-Type: text/csv");
header("Content-Disposition: attachment;filename=reservations.csv");
if (count($all)==0) { echo "No reservations"; }
else {
  // (B1) FIRST ROW - HEADERS
  foreach ($all[0] as $k=>$v) { echo "$k,"; }
  echo "\r\n";

  // (B2) RESERVATION DETAILS
  foreach ($all as $r) {
    foreach ($r as $k=>$v) { echo "$v,"; }
    echo "\r\n";
  }
}
