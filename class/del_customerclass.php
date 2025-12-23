<?php
class del_customerclass  extends connection{
    public function deleteaccount($user_id) {
        $stmt = $this->connect()->prepare("DELETE from users WHERE id = ?");
        if(!$stmt->execute([$user_id])){
            return false;
        } else {
            return true;
        }
    }
}
?>
