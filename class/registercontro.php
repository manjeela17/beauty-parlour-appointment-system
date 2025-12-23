<?php
class registercontroller extends register{
    private $username;
    private $email;
    private $phone_number;
    private $password;
    public function __construct($username,$email,$phone_number,$password){
      
     
        $this->username = $username;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
       
       }

       public function registeruser(){
        if($this->emptyInput()==false){
            header('location:../index.php?emptyInput');
            exit();
          }
          if($this->invemail()==false){
            header('location:../index.php?error=invalidEmail');
            exit();
          }
        $this->user($this->username,$this->email,$this->phone_number,$this->password);
         
       }

       private function emptyInput(){
        if( empty($this->username) || empty($this->email) || empty($this->phone_number) ||  empty($this->password)){
          return false;
        }
        return true;
       }
    
    private function invemail() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false; 
        }
        return true; 
    }
    
}
?>