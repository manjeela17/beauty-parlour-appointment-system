<?php
class edit_cus_class extends connection {
    public function update($cat_name, $price, $cat_id){ 
     
        $stmt = $this->connect()->prepare('UPDATE categories SET name = ?, price = ? WHERE cat_id = ?');
  
        if($stmt->execute([$cat_name, $price, $cat_id])){
            return true; 
        } else {
            return false; 
        }
    }
}
?>
