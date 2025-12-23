<?php
class feedbackcontro extends feedback_class{
    private $feedback_id;
    private $feedback_name;
    private $feedback_email;
    private $feedback_message;
    

    public function __construct($feedback_id,$feedback_name, $feedback_email, $feedback_message) {

        $this->feedback_id = $feedback_id;
        $this->feedback_name = $feedback_name;
        $this->feedback_email = $feedback_email;
        $this->feedback_message = $feedback_message;
    }

    public function submitfeedback() {
        if ($this->checkEmpty() == false) {
        
            return false;
        }
        // Call the submit method from the parent class
        return $this->submit($this->feedback_id, $this->feedback_name, $this->feedback_email, $this->feedback_message);
    }

    private function checkEmpty() {
        if (empty($this->feedback_id) ||empty($this->feedback_name) || empty($this->feedback_message) || empty($this->feedback_email)) {
            return false;
        }
        return true;
    }
  
}
?>
