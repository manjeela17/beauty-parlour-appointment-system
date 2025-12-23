<?php
include 'database.php';

function acceptAppointment($b_id, $conn) {
    $sql = "UPDATE booking SET status = 'Accepted' WHERE id = $b_id";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment accepted successfully";
    } else {
        echo "Error accepting appointment: " . $conn->error;
    }
}
function rejectAppointment($b_id, $conn) {
    $sql = "UPDATE booking SET status = 'Rejected' WHERE id = $b_id";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment rejected successfully";
    } else {
        echo "Error rejecting appointment: " . $conn->error;
    }
}
function deleteAppointment($b_id, $conn) {
    $sql = "DELETE FROM booking WHERE id = $b_id";
    if ($conn->query($sql) === TRUE) {
        echo "Appointment deleted successfully";
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }
}

?>

