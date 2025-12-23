<?php
class feedback_class extends connection{
    public function submit($feedback_id, $feedback_name, $feedback_email, $feedback_message){
        $stmt = $this->connect()->prepare('INSERT INTO feedback (id, f_name, f_email, f_message) VALUES (?, ?, ?, ?)');
        
        if(!$stmt->execute([$feedback_id, $feedback_name, $feedback_email, $feedback_message])){
            return false;
        }
        return true;
    }

    public function select() {
        $stmt = $this->connect()->prepare('SELECT * FROM feedback');
        if (!$stmt->execute()) {
            throw new Exception("Database query error");
        }

        if ($stmt->rowCount() == 0) {
            header('Location: ../feedback.php?error=usernotfound');
            exit();
        } else {
            $feedback = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $feedback;
        }
    }
}
?>