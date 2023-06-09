<?php

/**
 *
 */
class RegisterContr extends Register
{
  // declare properties for form fields
  private $userName;
  private $password;
  private $confirmPassword;
  private $firstName;
  private $surname;
  private $gender;
  private $email;
  private $countryCode;
  private $phoneNumber;
  private $address;
  private $profession;

  // initialize the properties and assign their values
  public function __construct($userName, $password, $confirmPassword, $firstName, $surname, $gender, $email, $countryCode, $phoneNumber, $address, $profession) {
    $this->userName = $userName;
    $this->password = $password;
    $this->confirmPassword = $confirmPassword;
    $this->firstName = $firstName;
    $this->surname = $surname;
    $this->gender = $gender;
    $this->email = $email;
    $this->countryCode = $countryCode;
    $this->phoneNumber = $phoneNumber;
    $this->address = $address;
    $this->profession = $profession;

  }

  public function registerUser() {
    if ($this->invalidEmail() == false) {
      header("Location: ../register.html?error=invalidemail");
      exit;
    }
    if ($this->pwdMatch() == false) {
      header("Location: ../register.html?error=passwordnotmatch");
      exit;
    }
    if ($this->userNameTaken() == false) {
      header("Location: ../register.html?error=usernameexists");
      exit;
    }

    $this->setUser($this->userName, $this->password, $this->firstName, $this->surname, $this->gender, $this->email, $this->countryCode, $this->phoneNumber, $this->address, $this->profession);
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

  // check if password match

  private function pwdMatch() {
    $result;
    if ($this->password !== $this->confirmPassword) {
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








 ?>
