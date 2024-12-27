<?php
require_once '../connection/conn.php';
class utilisateur {
  protected $nom;
  protected $prenom;
  protected $email;
  protected $password;
  protected $role;


  function authenticate($email,$password){
    if($this->email == $email && password_verify($password, $this->password)){
      $_SESSION["email"] = $this->email;
      $_SESSION["role"] = $this->role;
      echo 'welcome'. $this->nom . $this->prenom ;
      return true;
    }
    echo 'email ou password is incorrect';
  }
}


