<?php
class edit_class extends connection{
    public function edit( $username, $email, $phone_number,$id){
        $stmt = $this->connect()->prepare('UPDATE users SET username = ? , email = ? , phone_number = ? WHERE id = ?');
        if(!$stmt->execute([$username, $email, $phone_number, $id])){
            return false;
        }
        return true;
    }
}
?>
