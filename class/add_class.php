<?php
require_once 'database.php';

class ServiceManager extends Connection {
    // Method to check if a service already exists
    public function isServiceExists($serviceName, $category) {
        $stmt = $this->connect()->prepare('SELECT COUNT(*) FROM services WHERE service_name = ? AND category = ?');
        $stmt->execute([$serviceName, $category]);
        $count = $stmt->fetchColumn();
        return $count > 0; // Return true if the service exists, otherwise false
    }

    // Method to add a new service
    public function addService($serviceName, $category, $price) {
        // Check if the service already exists
        if ($this->isServiceExists($serviceName, $category)) {
            return false; // Service already exists, return false
        }

        // Proceed with adding the new service
        $stmt = $this->connect()->prepare('INSERT INTO services (service_name, category, price) VALUES (?, ?, ?)');
        if (!$stmt->execute([$serviceName, $category, $price])) {
            return false; // Insertion failed, return false
        }
        return true; // Service added successfully, return true
    }
}
?>
