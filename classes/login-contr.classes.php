<?php

/**
 *
 */
class LoginContr extends Login
{
  // declare properties for form fields
  private $userName;
  private $password;

  // initialize the properties and assign their values
  public function __construct($userName, $password) {
    $this->userName = $userName;
    $this->password = $password;
  }

  // login users
  public function loginUser() {

    $this->getUser($this->userName, $this->password);
    }
}



 ?>
