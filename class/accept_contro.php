<?php
class accept_contro extends acceptAppClass  {
    private $apointmentID;
    
    public function __construct($appointmentID) {
        $this->apointmentID = $appointmentID;
    }

    public function accept(){
        return $this->acceptAppointment($this->apointmentID);
    }
}
?>




