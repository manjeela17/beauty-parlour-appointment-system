<?php
class cancel_contro extends CancelAppClass {
    private $apointmentID;
    
    public function __construct($appointmentID) {
        $this->apointmentID = $appointmentID;
    }

    public function cancel(){
        return $this->cancelAppointment($this->apointmentID);
    }

}
?>




