<?php

class acceptAppClass  extends connection{
    public function acceptAppointment($appointment_id) {
        $stmt = $this->connect()->prepare("UPDATE booking SET status = 'Accepted' WHERE b_id = ?");
        if(!$stmt->execute([$appointment_id])){
            return false;
        } else {
            return true;
        }
    }
}
?>
