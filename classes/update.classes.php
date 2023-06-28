<?php

/**
 *
 */
class Update extends Dbh
{

  // update user info
  protected function resetUser($userid, $userName, $firstName, $surname, $gender, $email, $countryCode, $phoneNumber, $address, $profession) {
  $stmt = $this->connect()->prepare('UPDATE users SET users_id = :userid, users_username = :userName, users_firstname = :firstName, users_surname = :surname, users_gender = :gender, users_email = :email, users_countrycode = :countryCode, users_phonenumber = :phoneNumber, users_address = :address, users_profession = :profession WHERE users_id = :userid');

  $stmt->bindValue(':userid', $userid);
  $stmt->bindValue(':userName', $userName);
  $stmt->bindValue(':firstName', $firstName);
  $stmt->bindValue(':surname', $surname);
  $stmt->bindValue(':gender', $gender);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':countryCode', $countryCode);
  $stmt->bindValue(':phoneNumber', $phoneNumber);
  $stmt->bindValue(':address', $address);
  $stmt->bindValue(':profession', $profession);

  if (!$stmt->execute()) {
    $stmt = null;
    header("Location: ../profile.php?error=stmtfailed");
    exit();
  }
  $stmt = null;
}



  // check if username or email exists
  protected function checkUser($userName, $email) {
    $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_username = ? OR users_email = ?;');

    if (!$stmt->execute(array($userName, $email))) {
      $stmt = null;
      header("Location: ../profile.php?error=stmtfailed");
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
