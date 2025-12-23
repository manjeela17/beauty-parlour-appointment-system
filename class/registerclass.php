<?php
class register extends connection{
    public function user($username,$email,$phone_number,$password){
      
      $stmt = $this->connect()->prepare('INSERT INTO users (username,email,phone_number,password) VALUES (?,?,?,?)');

      $hashPassword = password_hash($password, PASSWORD_DEFAULT);

      if(!$stmt->execute([$username,$email,$phone_number,$hashPassword])){
        // header('location:../index.php?error=stmtfailed');
        exit();
      }
     
    }
   
}

