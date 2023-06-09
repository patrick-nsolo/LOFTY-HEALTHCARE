<?php

/**
 *
 */
class Dbh
{
// connect to Database
  protected function connect() {
    try {
      $username = "root";
      $password = "";
      $dbh = new PDO('mysql:host=localhost;dbname=loftyhealthcare', $username, $password);
      return $dbh;
    }
    catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }

  }
}







?>
