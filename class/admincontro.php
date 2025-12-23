<?php
class AdminControl extends Admin {
    private $user_id;
    private $status;
    private $b_id;

    public function __construct($user_id, $status = null, $b_id = null) {
        $this->user_id = $user_id;
        $this->status = $status;
        $this->b_id = $b_id;
    }

    public function getDashboard() {    
        return $this->dashboard();
    }

    public function action() {
        if ($this->checkEmpty() == false) {
            return false;
        }
        return $this->action($this->status, $this->b_id);
    }

    private function checkEmpty() {
        if (empty($this->status) || empty($this->b_id)) {
            return false;
        }
        return true;
    }
}
?>
