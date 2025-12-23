<?php
class edit_contro extends edit_class {
    private $username;
    private $email;
    private $phone_number;
    private $id;


    public function __construct( $username, $email, $phone_number, $id) {
        $this->username = $username;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->id = $id;
      
    }

    public function update() {
        if ($this->checkEmpty() == false) {
            return false;
        }
        return $this->edit($this->username, $this->email, $this->phone_number,  $this->id);
    }

    private function checkEmpty() {
        if (empty($this->username) || empty($this->email)|| empty($this->phone_number)) {
            return false;
        }
        return true;
    }
}
?>
