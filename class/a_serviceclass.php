<?php
class a_serviceclass extends connection{
    public function add($service, $price, $name){

        $stmt = $this->connect()->prepare('INSERT INTO categories ( service_id, price, name) VALUES (?, ?,?)');
        if(!$stmt->execute([$service, $price, $name])){
            return false;
        }
        return true;
        
    }
}
?>
