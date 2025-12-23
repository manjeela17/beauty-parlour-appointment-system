<?php
class cat_del_contro extends cat_del_class {
    private $cat_id;
    
    public function __construct($cat_id) {
        $this->cat_id= $cat_id;
    }

    public function delete(){
        return $this->deleteaccount($this->cat_id);
    }

}
?>




