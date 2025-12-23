<?php
class categoryclass extends connection{
    public function getCatagory(){
        $stmt = $this->connect()->prepare('SELECT * FROM catagory');
        if ($stmt->execute( )) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
            else {
            exit();
        }
    
    }
}
?>
