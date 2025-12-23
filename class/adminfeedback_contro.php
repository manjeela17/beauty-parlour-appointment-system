<?php
class feedbackcontro extends feedback_class{
    private $feedback_id;

    public function __construct($feedback_id) {
        $this->feedback_id = $feedback_id;
       
    }
    
    public function submitfeedback() {
        if ($this->checkEmpty() == false) {
            return false;
        }
   
    }

    private function checkEmpty() {
        if (empty($this->feedback_id)) {
            return false;
        }
        return true;
    }
    public function getfeedback() {    
  
              return $this->select();
    }
}

?>
