<?php

class Admin extends Connection {
    public function dashboard() {
        $stmt = $this->connect()->prepare('SELECT * FROM booking');

        if (!$stmt->execute()) {
            throw new Exception("Database query error");
        }

        if ($stmt->rowCount() == 0) {
            header('Location: ../book.php?error=usernotfound');
            exit();
        } else {
            $dashboard = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dashboard;
        }
    }
    public function update($status,$b_id ){
        $stmt = $this->connect()->prepare('UPDATE booking set status=? where b_id=? ');
    
            if ($stmt->execute([$status,$b_id])) {
      return true;
        }else{
        return false;
        
    }
}
}
?>



        

