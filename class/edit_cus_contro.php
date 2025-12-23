<?php

require_once 'edit_cus_class.php';

class edit_cus_contro extends edit_cus_class{
    private $cat_name;
    private $price;
    private $cat_id;

    public function __construct($cat_name, $price, $cat_id) {
        $this->cat_name = $cat_name;
        $this->price = $price;
        $this->cat_id = $cat_id;
    }

    public function updateRecord() {

        if ($this->checkEmpty() == false) {
            return false;
        }
        
        return $this->update($this->cat_name, $this->price, $this->cat_id);
    }
    private function checkEmpty() {
        if (empty($this->cat_name) || empty($this->price) || empty($this->cat_id)) {
            return false; // Return false if any property is empty
        }
        return true; // Return true if all properties are not empty
    }
}
?>
