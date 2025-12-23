<?php

class CancelAppClass  extends connection{
    public function cancelAppointment($appointment_id) {
        $stmt = $this->connect()->prepare("UPDATE booking SET status = 'Cancelled' WHERE b_id = ?");
        if(!$stmt->execute([$appointment_id])){
            return false;
        } else {
            return true;
        }
    }
}
?>
