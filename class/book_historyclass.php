<?php

class Book extends connection {
    public function bookingHistory($user_id) {
        $stmt = $this->connect()->prepare('SELECT * FROM booking WHERE id = ?');

        
        if (!$stmt->execute([$user_id])) {
            exit("Database query error");
        }


            $bookingHistory= $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $bookingHistory;
        }
    
}

?>