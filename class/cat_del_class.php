<?php

class cat_del_class  extends connection{
    public function deleteaccount($cat_id) {
        $stmt = $this->connect()->prepare("DELETE from categories WHERE cat_id = ?");
        if(!$stmt->execute([$cat_id])){
            return false;
        } else {
            return true;
        }
    }
}
?>
