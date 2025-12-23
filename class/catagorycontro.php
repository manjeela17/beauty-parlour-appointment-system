<?php
class catagorycontro extends categoryclass {
    private $categoryList;

    public function __construct() {}

    public function getCategoryNow() {
        return $this->getCatagory();
    }
}
?>
