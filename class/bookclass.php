<?php
class book_class extends connection{
    public function isSlotAvailable($appointmentdate, $appointmenttime, $category){
        $stmt = $this->connect()->prepare('SELECT COUNT(*) FROM booking WHERE b_date = ? AND b_time = ? AND b_category = ? AND status != "Cancelled" AND status != "Rejected"');
        $stmt->execute([$appointmentdate, $appointmenttime, $category]);
        $count = $stmt->fetchColumn();
        return $count == 0; // Return true if no appointments with status other than Cancelled or Rejected exist for the specified date, time, and category
    }

    public function book($customerid, $customername, $appointmentdate, $appointmenttime, $category, $service){
        // Check if the slot is available
        if(!$this->isSlotAvailable($appointmentdate, $appointmenttime, $category)) {
            return false; // Slot is not available, return false
        }

        // Proceed with booking if the slot is available
        $stmt = $this->connect()->prepare('INSERT INTO booking (id, customer_name, b_date, b_time, b_category, b_service) VALUES (?, ?, ?, ?, ?, ?)');
        if(!$stmt->execute([$customerid, $customername, $appointmentdate, $appointmenttime, $category, $service])){
            return false;
        }
        return true;
    }
}
?>
