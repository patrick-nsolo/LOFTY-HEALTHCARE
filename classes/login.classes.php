<?php

/**
 *
 */
class Login extends Dbh
{

  // signup user
  protected function getUser($userName, $password) {
    $stmt = $this->connect()->prepare('SELECT users_password FROM users WHERE users_username = ? OR users_email = ?;');

    if (!$stmt->execute(array($userName, $password))) {
      $stmt = null;
      header("Location: ../login.php?error=stmtfailed");
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = null;
      header("Location: ../login.php?error=usernotfound");
      exit();
    }

    $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPassword = password_verify($password, $passwordHashed[0]["users_password"]);

    if ($checkPassword == false) {
      $stmt = null;
      header("Location: ../login.php?error=wrongpassword");
      exit();

    } elseif ($checkPassword == true) {
      $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_username = ? OR users_email = ? AND users_password = ?;');

      if (!$stmt->execute(array($userName, $userName, $password))) {
        $stmt = null;
        header("Location: ../login.php?error=stmtfailed");
        exit();
      }

      if ($stmt->rowCount() == 0) {
        $stmt = null;
        header("Location: ../login.php?error=usernotfoundagain");
        exit();
      }

      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["userid"] = $user[0]["users_id"];
      $_SESSION["username"] = $user[0]["users_username"];
      $_SESSION["firstname"] = $user[0]["users_firstname"];
      $_SESSION["surname"] = $user[0]["users_surname"];
      $_SESSION["gender"] = $user[0]["users_gender"];
      $_SESSION["email"] = $user[0]["users_email"];
      $_SESSION["phone"] = $user[0]["users_phonenumber"];
      $_SESSION["profession"] = $user[0]["users_profession"];
      $_SESSION["address"] = $user[0]["users_address"];


      $stmt = null;
    }

    $stmt = null;

  }

}

?>
