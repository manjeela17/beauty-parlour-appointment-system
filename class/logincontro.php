<?php
class logincontro extends Login{
   
   private $email;
   
   private $password;
   

   public function __construct($email,$password){
   
    $this->email = $email;
   
    $this->password = $password;
   
   }
   public function setUser(){
    if($this->empty()==false){
      header('location:../index.php?error=emptyInput');
      exit();
    }
   
    $this->user($this->email,$this->password);
   }
   private function empty(){
    
    if( empty($this->email) || empty($this->password)){
      return false;
    }
    return true;
   }
}
?>