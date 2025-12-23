<?php
class del_customercontro extends del_customerclass {
    private $userID;
    
    public function __construct($userID) {
        $this->userID = $userID;
    }

    public function delete(){
        return $this->deleteaccount($this->userID);
    }

}
?>




