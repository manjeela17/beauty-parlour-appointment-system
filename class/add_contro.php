<?php
require_once 'ServiceManager.php';

class ServiceController {
    private $serviceName;
    private $category;
    private $price;
    private $serviceManager;

    public function __construct($serviceName, $category, $price) {
        $this->serviceName = $serviceName;
        $this->category = $category;
        $this->price = $price;
        $this->serviceManager = new ServiceManager(); // Create an instance of ServiceManager
    }

    public function addServiceNow() {
        if ($this->checkEmpty() == false) {
            return false;
        }
        return $this->serviceManager->addService($this->serviceName, $this->category, $this->price);
    }

    private function checkEmpty() {
        if (empty($this->serviceName) || empty($this->category) || empty($this->price)) {
            return false;
        }
        return true;
    }
}
?>
