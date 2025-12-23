<?php

class rejectAppClass  extends connection{
    public function rejectAppointment($appointment_id) {
        $stmt = $this->connect()->prepare("UPDATE booking SET status = 'Rejected' WHERE b_id = ?");
        if(!$stmt->execute([$appointment_id])){
            return false;
        } else {
            return true;
        }
    }
}
?>
