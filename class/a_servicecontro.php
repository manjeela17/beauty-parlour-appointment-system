<?php
class a_servicecontro extends a_serviceclass {
    private $service;
    private $price;
    private $name;

    public function __construct($service, $price, $name) {
   
        $this->service = $service;
        $this->price = $price;
        $this->name = $name;
    
    }

    public function add_service() {
        if ($this->checkEmpty() == false) {
            return false;
        }
        return $this->add($this->service, $this->price, 
        $this->name);
    }

    private function checkEmpty() {
        if ( empty($this->service) || empty($this->price) || empty($this->name)) {
            return false;
            
        }
        return true;
    }
}
?>
