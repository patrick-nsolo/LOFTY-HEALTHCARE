<?php

/**
 *
 */
class UpdateContr extends Update
{
  // declare properties for form fields
  private $userid;
  private $userName;
  private $firstName;
  private $surname;
  private $gender;
  private $email;
  private $countryCode;
  private $phoneNumber;
  private $address;
  private $profession;


  function __construct($userid, $userName, $firstName, $surname, $gender, $email, $countryCode, $phoneNumber, $address, $profession)
  {
    $this->userid = $userid;
    $this->userName = $userName;
    $this->firstName = $firstName;
    $this->surname = $surname;
    $this->gender = $gender;
    $this->email = $email;
    $this->countryCode = $countryCode;
    $this->phoneNumber = $phoneNumber;
    $this->address = $address;
    $this->profession = $profession;
  }

  public function updateUser() {
    if ($this->invalidEmail() == false) {
      header("Location: ../update.php?error=invalidemail");
      exit();
    }
    if ($this->userNameTaken() == false) {
      header("Location: ../update.php?error=usernameexists");
      exit();
    }

    $this->resetUser($this->userid, $this->userName, $this->firstName, $this->surname, $this->gender, $this->email, $this->countryCode, $this->phoneNumber, $this->address, $this->profession);
    }

  // check for invalid email
  private function invalidEmail() {
    $result;
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $result = false;
    }
    else {
      $result = true;
    }
    return $result;
  }

  // check if username or email is taken

  private function userNameTaken() {
    $result;
    if (!$this->checkUser($this->userName, $this->email)) {
      $result = false;
    }
    else {
      $result = true;
    }
    return $result;
  }
}
