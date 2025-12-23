<?php

class m_class extends connection {
    public function manage($cat_id) {
        $stmt = $this->connect()->prepare('SELECT * FROM categories WHERE cat_id = ?');

        
        if (!$stmt->execute([$cat_id])) {
            exit("Database query error");
        }


            $manage= $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $manage;    
            }
    
}

?>