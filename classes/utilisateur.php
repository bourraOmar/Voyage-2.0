<?php
class utilisateur {
  private $nom;
  private $prenom;
  private $email;
  private $password;

  function __construct($email,$password){
    $this->email = $email;
    $this->password = $password;
  }

  function authenticate($email,$password){
    if($this->email = $email && $this->password = $password){
      echo 'welcome'.$this->nom. $this->prenom;
      return true;
    }
    echo 'email ou password is incorrect';
  }
}