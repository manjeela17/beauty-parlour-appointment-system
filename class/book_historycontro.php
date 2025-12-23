<?php
class book_historycontro extends book{
   
   private $user_id;
   
   public function __construct($user_id){
   
    $this->user_id = $user_id;
   }

   public function getbookinghistory(){
    if($this->empty()==false){
      header('location:../book.php?error=emptyInput');
      exit();

    }
    $bookingHistory = $this->bookingHistory($this->user_id);

    return $bookingHistory;
   }

   private function empty(){
    
    if( empty($this->user_id)){
    
      return false;
    }
    return true;
   
   }

}
?>