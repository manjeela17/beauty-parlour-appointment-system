<?php
class delete_contro extends deleteAppClass {
    private $apointmentID;
    
    public function __construct($appointmentID) {
        $this->apointmentID = $appointmentID;
    }

    public function delete(){
        return $this->deleteAppointment($this->apointmentID);
    }

}
?>




