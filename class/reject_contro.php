<?php
class reject_contro extends rejectAppClass  {
    private $apointmentID;
    
    public function __construct($appointmentID) {
        $this->apointmentID = $appointmentID;
    }

    public function reject(){
        return $this->rejectAppointment($this->apointmentID);
    }
}
?>




