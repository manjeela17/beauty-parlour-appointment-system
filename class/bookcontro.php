<?php
class bookcontro extends book_class {
    private $customerid;
    private $customername;
    private $appointmentdate;
    private $appointmenttime;
    private $category;
    private $service;

    public function __construct($customerid, $customername, $appointmentdate, $appointmenttime, $category, $service) {
        $this->customerid = $customerid;
        $this->customername = $customername;
        $this->appointmentdate = $appointmentdate;
        $this->appointmenttime = $appointmenttime;
        $this->category = $category;
        $this->service = $service;
    }

    public function booknow() {
        if ($this->checkEmpty() == false) {
            return false;
        }
        return $this->book($this->customerid, $this->customername, $this->appointmentdate, $this->appointmenttime, $this->category, $this->service);
    }

    private function checkEmpty() {
        if (empty($this->customerid) || empty($this->customername) || empty($this->appointmentdate) || empty($this->appointmenttime) || empty($this->category) || empty($this->service)) {
            return false;
        }
        return true;
    }
}
?>
