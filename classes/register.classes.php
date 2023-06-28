<?php

/**
 *
 */
class Register extends Dbh
{

  // signup user
  protected function setUser($userName, $password, $firstName, $surname, $gender, $email, $countryCode, $phoneNumber, $address, $profession, $cvFilePath, $pictureFilePath) {
    $stmt = $this->connect()->prepare('INSERT INTO users (users_username, users_password, users_firstname, users_surname, users_gender, users_email, users_countrycode, users_phonenumber, users_address, users_profession, users_cv, users_pic) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);');

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    if (!$stmt->execute(array($userName, $hashedPwd, $firstName, $surname, $gender, $email, $countryCode, $phoneNumber, $address, $profession, $cvFilePath, $pictureFilePath))) {
      $stmt = null;
      header("Location: ../register.php?error=stmtfailed");
      exit();
    }
    $stmt = null;

  }

  // check if username or email exists
  protected function checkUser($userName, $email) {
    $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_username = ? OR users_email = ?;');

    if (!$stmt->execute(array($userName, $email))) {
      $stmt = null;
      header("Location: ../register.php?error=stmtfailed");
      exit();
    }

    $resultCheck = $stmt;
    if ($resultCheck->rowCount() > 0) {
      $resultCheck = false;
    }
    else {
      $resultCheck = true;
    }
    return $resultCheck;

  }
}



?>
