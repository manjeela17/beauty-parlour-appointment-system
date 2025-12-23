<?php
include '../includes/database.php';

class ServiceFetcher extends Connection {
    public function fetchServices() {
        // Adjust the column names based on your table structure
        $sql = "SELECT service_id, name FROM services";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $services;
    }
}
?>
