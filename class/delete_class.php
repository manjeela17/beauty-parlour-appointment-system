<?php

class deleteAppClass  extends connection{
    public function deleteAppointment($appointment_id) {
        $stmt = $this->connect()->prepare("DELETE from booking  WHERE b_id = ?");
        if(!$stmt->execute([$appointment_id])){
            return false;
        } else {
            return true;
        }
    }
}
?>
